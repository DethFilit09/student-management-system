<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'department_id', 'gender']);
        $sort    = $request->query('sort') === 'oldest' ? 'asc' : 'desc';

        $students = Student::with('department')
            ->filter($filters)
            ->orderBy('student_id', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'students'    => $students,
            'departments' => Department::orderBy('dept_name')->get(),
            'filters'     => $filters,
            'sort'        => $request->query('sort', 'newest'),
            'totalStudents' => Student::count(),
            'totalDepartments' => Department::count(),
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'departments' => Department::orderBy('dept_name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Student::create($this->validated($request));

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        $student->load('department');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'student'     => $student,
            'departments' => Department::orderBy('dept_name')->get(),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($this->validated($request, $student));

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }

    private function validated(Request $request, ?Student $student = null): array
    {
        return $request->validate([
            'student_name'    => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255',
                                  Rule::unique('students', 'email')->ignore($student?->student_id, 'student_id')],
            'gender'          => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'enrollment_date' => ['required', 'date', 'before_or_equal:today'],
            'department_id'   => ['nullable', 'exists:departments,department_id'],
            'description'     => ['nullable', 'string'],
        ]);
    }
}
