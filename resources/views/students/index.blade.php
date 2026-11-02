<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div>
                <h1>🎓 Student Directory</h1>
                <p>Browse and manage all registered students.</p>
            </div>
            <a href="{{ route('students.create') }}" class="sms-btn white">+ Add Student</a>
        </div>
        <div class="sms-chips">
            <div class="sms-chip"><b data-count="{{ $totalStudents }}">0</b><span>Total Students</span></div>
            <div class="sms-chip"><b data-count="{{ $totalDepartments }}">0</b><span>Departments</span></div>
        </div>
    </x-slot>

    <div class="sms-card">
        <form method="GET" action="{{ route('students.index') }}" class="sms-filters" data-autosubmit>
            <div class="sms-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" class="sms-input" placeholder="Search by name or email...">
            </div>
            <select name="department_id" class="sms-select">
                <option value="">All Departments</option>
                @foreach ($departments as $d)
                    <option value="{{ $d->department_id }}" @selected((string) ($filters['department_id'] ?? '') === (string) $d->department_id)>{{ $d->dept_name }}</option>
                @endforeach
            </select>
            <select name="gender" class="sms-select">
                <option value="">All Genders</option>
                @foreach (['Male', 'Female', 'Other'] as $g)
                    <option value="{{ $g }}" @selected(($filters['gender'] ?? '') === $g)>{{ $g }}</option>
                @endforeach
            </select>
            <select name="sort" class="sms-select">
                <option value="newest" @selected($sort === 'newest')>Newest First</option>
                <option value="oldest" @selected($sort === 'oldest')>Oldest First</option>
            </select>
            <button class="sms-btn">Search</button>
        </form>
        @if (array_filter($filters))
            <p style="margin-top:12px"><a href="{{ route('students.index') }}" class="sms-badge">✕ Clear filters</a></p>
        @endif

        <div class="sms-tablewrap">
            <table class="sms-table">
                <thead>
                    <tr><th>ID</th><th>Student</th><th>Contact</th><th>Enrollment</th><th>Department</th><th style="text-align:right">Actions</th></tr>
                </thead>
                <tbody>
                @forelse ($students as $s)
                    <tr style="--i:{{ $loop->index }}">
                        <td>#{{ $s->student_id }}</td>
                        <td>
                            <div class="sms-who">
                                <span class="sms-avatar" style="--h:{{ ($s->student_id * 47) % 360 }}">{{ strtoupper(substr($s->student_name, 0, 1)) }}</span>
                                <div><b>{{ $s->student_name }}</b><small>{{ $s->gender }}</small></div>
                            </div>
                        </td>
                        <td>{{ $s->email }}<br><span class="sms-sub">{{ $s->description ?? 'N/A' }}</span></td>
                        <td>{{ $s->enrollment_date->format('M d, Y') }}<br><span class="sms-sub">{{ $s->years_enrolled }} years</span></td>
                        <td>
                            @if ($s->department)<span class="sms-badge">{{ $s->department->dept_name }}</span>
                            @else<span class="sms-badge mute">N/A</span>@endif
                        </td>
                        <td>
                            <a href="{{ route('students.show', $s) }}" class="sms-btn sm info">View</a>
                            <a href="{{ route('students.edit', $s) }}" class="sms-btn sm ok">Edit</a>
                            <form method="POST" action="{{ route('students.destroy', $s) }}" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="button" class="sms-btn sm bad" data-confirm="Delete {{ $s->student_name }}?">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="sms-empty">No students found 🔍</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="sms-foot">
            <span>Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} entries</span>
            {{ $students->links('pagination.sms') }}
        </div>
    </div>
</x-app-layout>
