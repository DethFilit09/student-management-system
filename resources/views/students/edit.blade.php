<x-app-layout>
    <x-slot name="header">
        <h1>✏️ Edit Student #{{ $student->student_id }}</h1>
        <p>Update the details of {{ $student->student_name }}.</p>
    </x-slot>

    <div class="sms-card" style="max-width:820px;margin:0 auto">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('PUT')
            @include('students._form')
            <div class="sms-actions">
                <button class="sms-btn">Update Student</button>
                <a href="{{ route('students.index') }}" class="sms-btn ghost">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
