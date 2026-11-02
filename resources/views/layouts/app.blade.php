<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Student Management') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @include('partials.theme')
</head>
<body class="sms">
<header class="sms-nav">
    <div class="sms-wrap in">
        <a href="{{ route('dashboard') }}" class="sms-brand"><span class="sms-logo">🎓</span> StudentHub</a>
        <button class="sms-burger" type="button" aria-label="Menu">☰</button>
        <nav class="sms-links">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'on' : '' }}">Dashboard</a>
            <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'on' : '' }}">Students</a>
            <a href="{{ route('departments.index') }}" class="{{ request()->routeIs('departments.*') ? 'on' : '' }}">Departments</a>
            @if (Route::has('profile.edit'))
                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'on' : '' }}">Profile</a>
            @endif
        </nav>
        <div class="sms-user">
            <span class="sms-avatar" style="--h:{{ (auth()->id() * 47) % 360 }}">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="sms-btn sm ghost">Logout</button>
            </form>
        </div>
    </div>
</header>

@if (session('success') || session('status'))
    <div class="sms-toast">✅ {{ session('success') ?? session('status') }}</div>
@endif

<main class="sms-wrap sms-page">
    @isset($header)
        <section class="sms-hero">{{ $header }}</section>
    @endisset

    {{ $slot }}
</main>

{{-- Delete confirmation modal --}}
<div class="sms-modal" id="smsModal">
    <div class="box">
        <div class="em">🗑️</div>
        <h3>Are you sure?</h3>
        <p data-msg>This cannot be undone.</p>
        <div class="sms-actions">
            <button type="button" class="sms-btn ghost" data-cancel>Cancel</button>
            <button type="button" class="sms-btn bad" data-ok>Yes, delete</button>
        </div>
    </div>
</div>
</body>
</html>
