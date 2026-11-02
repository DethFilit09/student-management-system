<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $departments = Department::withCount('students')
            ->when($search, fn ($q, $s) => $q->where('dept_name', 'like', "%{$s}%"))
            ->orderBy('dept_name')
            ->paginate(10)
            ->withQueryString();

        return view('departments.index', compact('departments', 'search'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        Department::create($this->validated($request));

        return redirect()->route('departments.index')->with('success', 'Department created.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->update($this->validated($request, $department));

        return redirect()->route('departments.index')->with('success', 'Department updated.');
    }

    public function destroy(Department $department)
    {
        $department->delete(); // students keep existing, department_id set to NULL

        return redirect()->route('departments.index')->with('success', 'Department deleted.');
    }

    private function validated(Request $request, ?Department $department = null): array
    {
        return $request->validate([
            'dept_name'    => ['required', 'string', 'max:255',
                               Rule::unique('departments', 'dept_name')->ignore($department?->department_id, 'department_id')],
            'manager_name' => ['nullable', 'string', 'max:255'],
            'location'     => ['nullable', 'string', 'max:255'],
        ]);
    }
}
