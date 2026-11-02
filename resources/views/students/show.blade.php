<x-app-layout>
    <x-slot name="header">
        <div class="sms-who">
            <span class="sms-avatar" style="--h:{{ ($student->student_id * 47) % 360 }};width:64px;height:64px;font-size:26px">{{ strtoupper(substr($student->student_name, 0, 1)) }}</span>
            <div>
                <h1>{{ $student->student_name }}</h1>
                <p>Student #{{ $student->student_id }} · {{ $student->department?->dept_name ?? 'No department' }}</p>
            </div>
        </div>
    </x-slot>

    <div class="sms-card" style="max-width:720px;margin:0 auto">
        <ul class="sms-detail">
            <li><span>Email</span><b>{{ $student->email }}</b></li>
            <li><span>Gender</span><b>{{ $student->gender }}</b></li>
            <li><span>Enrollment</span><b>{{ $student->enrollment_date->format('M d, Y') }} ({{ $student->years_enrolled }} years)</b></li>
            <li><span>Department</span><b>{{ $student->department?->dept_name ?? 'N/A' }}</b></li>
            <li><span>Notes</span><b>{{ $student->description ?? 'N/A' }}</b></li>
        </ul>
        <div class="sms-actions" style="margin-top:20px">
            <a href="{{ route('students.edit', $student) }}" class="sms-btn">Edit</a>
            <a href="{{ route('students.index') }}" class="sms-btn ghost">Back</a>
        </div>
    </div>
</x-app-layout>
