<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $byDepartment = Department::withCount('students')->orderByDesc('students_count')->get();

        return view('dashboard', [
            'totalStudents'    => Student::count(),
            'totalDepartments' => Department::count(),
            'male'             => Student::where('gender', 'Male')->count(),
            'female'           => Student::where('gender', 'Female')->count(),
            'recent'           => Student::with('department')->latest('student_id')->take(5)->get(),
            'byDepartment'     => $byDepartment,
            'maxCount'         => $byDepartment->max('students_count'),
        ]);
    }
}
