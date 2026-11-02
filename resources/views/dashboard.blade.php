<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div>
                <h1>Hello, {{ auth()->user()->name }} 👋</h1>
                <p>Here is what is happening at your school today.</p>
            </div>
            <a href="{{ route('students.create') }}" class="sms-btn white">+ Register Student</a>
        </div>
    </x-slot>

    <div class="sms-grid g4">
        <div class="sms-card sms-stat lift" style="animation-delay:.05s"><div class="ic">🎓</div><div class="n" data-count="{{ $totalStudents }}">0</div><div class="l">Total Students</div></div>
        <div class="sms-card sms-stat lift" style="animation-delay:.12s"><div class="ic">🏫</div><div class="n" data-count="{{ $totalDepartments }}">0</div><div class="l">Departments</div></div>
        <div class="sms-card sms-stat lift" style="animation-delay:.19s"><div class="ic">👨</div><div class="n" data-count="{{ $male }}">0</div><div class="l">Male Students</div></div>
        <div class="sms-card sms-stat lift" style="animation-delay:.26s"><div class="ic">👩</div><div class="n" data-count="{{ $female }}">0</div><div class="l">Female Students</div></div>
    </div>

    <div class="sms-grid g2" style="margin-top:18px">
        <div class="sms-card" style="animation-delay:.3s">
            <h3>Recently registered</h3>
            <div class="sms-tablewrap" style="margin-top:0">
                <table class="sms-table">
                    <tbody>
                    @forelse ($recent as $s)
                        <tr style="--i:{{ $loop->index }}">
                            <td>
                                <div class="sms-who">
                                    <span class="sms-avatar" style="--h:{{ ($s->student_id * 47) % 360 }}">{{ strtoupper(substr($s->student_name, 0, 1)) }}</span>
                                    <div><b>{{ $s->student_name }}</b><small>{{ $s->email }}</small></div>
                                </div>
                            </td>
                            <td style="text-align:right"><span class="sms-badge">{{ $s->department?->dept_name ?? 'N/A' }}</span></td>
                        </tr>
                    @empty
                        <tr><td class="sms-empty">No students yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('students.index') }}" class="sms-btn sm info" style="margin-top:6px">View all students →</a>
        </div>

        <div class="sms-card sms-bars" style="animation-delay:.38s">
            <h3>Students per department</h3>
            @forelse ($byDepartment as $d)
                <div class="r">
                    <div class="t"><span>{{ $d->dept_name }}</span><span>{{ $d->students_count }}</span></div>
                    <div class="b"><i style="--w:{{ $maxCount ? round($d->students_count / $maxCount * 100) : 0 }}%;--i:{{ $loop->index }}"></i></div>
                </div>
            @empty
                <p class="sms-sub">No departments yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
