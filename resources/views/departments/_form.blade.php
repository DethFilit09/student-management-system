@php $d = $department ?? null; @endphp

<div class="sms-field">
    <label class="sms-label">Department Name</label>
    <input type="text" name="dept_name" value="{{ old('dept_name', $d?->dept_name) }}" class="sms-input @error('dept_name') err @enderror" required>
    @error('dept_name')<div class="sms-error">{{ $message }}</div>@enderror
</div>
<div class="sms-field">
    <label class="sms-label">Manager</label>
    <input type="text" name="manager_name" value="{{ old('manager_name', $d?->manager_name) }}" class="sms-input">
</div>
<div class="sms-field">
    <label class="sms-label">Location</label>
    <input type="text" name="location" value="{{ old('location', $d?->location) }}" class="sms-input">
</div>
