<x-app-layout>
    <x-slot name="header">
        <h1>🎓 Student Registration</h1>
        <p>Complete the form below to register a new student.</p>
    </x-slot>

    <div class="sms-card" style="max-width:820px;margin:0 auto">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            @include('students._form')
            <div class="sms-actions">
                <button class="sms-btn">Submit Registration</button>
                <button type="reset" class="sms-btn ghost">Reset Form</button>
                <a href="{{ route('students.index') }}" class="sms-btn info">View Student List</a>
            </div>
        </form>
    </div>
</x-app-layout>
