<x-app-layout>
    <x-slot name="header">
        <h1>🏫 New Department</h1>
        <p>Add a department that students can belong to.</p>
    </x-slot>

    <div class="sms-card" style="max-width:640px;margin:0 auto">
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
            @include('departments._form')
            <div class="sms-actions">
                <button class="sms-btn">Save Department</button>
                <a href="{{ route('departments.index') }}" class="sms-btn ghost">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
