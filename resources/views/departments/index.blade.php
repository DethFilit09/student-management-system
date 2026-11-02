<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div>
                <h1>🏫 Departments</h1>
                <p>Organise students into departments.</p>
            </div>
            <a href="{{ route('departments.create') }}" class="sms-btn white">+ Add Department</a>
        </div>
    </x-slot>

    <div class="sms-card">
        <form method="GET" action="{{ route('departments.index') }}" class="sms-filters" style="grid-template-columns:1fr auto auto">
            <div class="sms-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                <input type="text" name="search" value="{{ $search }}" class="sms-input" placeholder="Search by department name...">
            </div>
            <button class="sms-btn">Search</button>
            @if ($search)<a href="{{ route('departments.index') }}" class="sms-btn ghost">Clear</a>@endif
        </form>

        <div class="sms-tablewrap">
            <table class="sms-table">
                <thead>
                    <tr><th>ID</th><th>Department</th><th>Manager</th><th>Location</th><th>Students</th><th style="text-align:right">Actions</th></tr>
                </thead>
                <tbody>
                @forelse ($departments as $d)
                    <tr style="--i:{{ $loop->index }}">
                        <td>#{{ $d->department_id }}</td>
                        <td><b>{{ $d->dept_name }}</b></td>
                        <td>{{ $d->manager_name ?? 'N/A' }}</td>
                        <td>{{ $d->location ?? 'N/A' }}</td>
                        <td><span class="sms-badge">{{ $d->students_count }}</span></td>
                        <td>
                            <a href="{{ route('departments.edit', $d) }}" class="sms-btn sm ok">Edit</a>
                            <form method="POST" action="{{ route('departments.destroy', $d) }}" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="button" class="sms-btn sm bad" data-confirm="Delete department {{ $d->dept_name }}? Its students will be kept.">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="sms-empty">No departments found 🔍</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="sms-foot">
            <span>{{ $departments->total() }} departments</span>
            {{ $departments->links('pagination.sms') }}
        </div>
    </div>
</x-app-layout>
