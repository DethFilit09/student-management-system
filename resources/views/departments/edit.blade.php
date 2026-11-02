<x-app-layout>
    <x-slot name="header">
        <h1>✏️ Edit Department</h1>
        <p>Update {{ $department->dept_name }}.</p>
    </x-slot>

    <div class="sms-card" style="max-width:640px;margin:0 auto">
        <form method="POST" action="{{ route('departments.update', $department) }}">
            @csrf
            @method('PUT')
            @include('departments._form')
            <div class="sms-actions">
                <button class="sms-btn">Update Department</button>
                <a href="{{ route('departments.index') }}" class="sms-btn ghost">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
