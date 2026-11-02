<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Demo login: admin@example.com / password
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        $mis    = Department::firstOrCreate(['dept_name' => 'Management Information System'],
                    ['manager_name' => 'Dr. Sok Dara', 'location' => 'Building A']);
        $design = Department::firstOrCreate(['dept_name' => 'Design'],
                    ['manager_name' => 'Ms. Chan Srey', 'location' => 'Building B']);
        $it     = Department::firstOrCreate(['dept_name' => 'Information Technology'],
                    ['manager_name' => 'Mr. Vann Rith', 'location' => 'Building C']);

        $students = [
            ['Kong Sopheak', 'kongsopheak@gmail.com', 'Male',   '2022-01-01', $mis->department_id],
            ['Ly Chhailin',  'lin@gmail.com',         'Female', '2022-01-01', $design->department_id],
            ['Pov Nita',     'povnita@gmail.com',     'Female', '2023-04-11', $mis->department_id],
            ['Leng Makara',  'lengmakara@gmail.com',  'Male',   '2024-11-01', $design->department_id],
            ['Sam Vichea',   'vichea@gmail.com',      'Male',   '2023-09-05', $it->department_id],
        ];

        foreach ($students as [$name, $email, $gender, $date, $dept]) {
            Student::firstOrCreate(['email' => $email], [
                'student_name'    => $name,
                'gender'          => $gender,
                'enrollment_date' => $date,
                'department_id'   => $dept,
            ]);
        }
    }
}
