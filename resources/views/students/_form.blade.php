@php $s = $student ?? null; @endphp

<div class="sms-field">
    <label class="sms-label">Student Name</label>
    <input type="text" name="student_name" value="{{ old('student_name', $s?->student_name) }}" class="sms-input @error('student_name') err @enderror" required>
    @error('student_name')<div class="sms-error">{{ $message }}</div>@enderror
</div>

<div class="sms-field">
    <label class="sms-label">Email Address</label>
    <input type="email" name="email" value="{{ old('email', $s?->email) }}" class="sms-input @error('email') err @enderror" required>
    @error('email')<div class="sms-error">{{ $message }}</div>@enderror
</div>

<div class="sms-row">
    <div class="sms-field">
        <label class="sms-label">Gender</label>
        <select name="gender" class="sms-select @error('gender') err @enderror" required>
            <option value="">-- Select --</option>
            @foreach (['Male', 'Female', 'Other'] as $g)
                <option value="{{ $g }}" @selected(old('gender', $s?->gender) === $g)>{{ $g }}</option>
            @endforeach
        </select>
        @error('gender')<div class="sms-error">{{ $message }}</div>@enderror
    </div>
    <div class="sms-field">
        <label class="sms-label">Enrollment Date</label>
        <input type="date" name="enrollment_date" value="{{ old('enrollment_date', $s?->enrollment_date?->format('Y-m-d')) }}" class="sms-input @error('enrollment_date') err @enderror" required>
        @error('enrollment_date')<div class="sms-error">{{ $message }}</div>@enderror
    </div>
    <div class="sms-field">
        <label class="sms-label">Department</label>
        <select name="department_id" class="sms-select @error('department_id') err @enderror">
            <option value="">-- None --</option>
            @foreach ($departments as $d)
                <option value="{{ $d->department_id }}" @selected((string) old('department_id', $s?->department_id) === (string) $d->department_id)>{{ $d->dept_name }}</option>
            @endforeach
        </select>
        @error('department_id')<div class="sms-error">{{ $message }}</div>@enderror
    </div>
</div>

<div class="sms-field">
    <label class="sms-label">Additional Information</label>
    <textarea name="description" rows="3" class="sms-textarea" placeholder="Enter any additional information about the student">{{ old('description', $s?->description) }}</textarea>
</div>
