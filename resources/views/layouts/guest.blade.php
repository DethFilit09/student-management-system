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
<body class="sms sms-static">
<div class="sms-auth">
    <aside class="sms-side">
        <span class="sms-blob a"></span><span class="sms-blob b"></span><span class="sms-blob c"></span>
        <div class="sms-brand" style="color:#fff;margin-bottom:34px"><span class="sms-logo" style="background:rgba(255,255,255,.2)">🎓</span> StudentHub</div>
        <h2>Manage students.<br>Beautifully.</h2>
        <p>One place to register students, organise departments and find anyone in seconds.</p>
        <ul>
            <li>✨ Fast search &amp; smart filters</li>
            <li>🏫 Students linked to departments</li>
            <li>🔒 Secure login for staff</li>
        </ul>
    </aside>
    <section class="sms-formside">
        <div class="sms-authcard">
            {{ $slot }}
        </div>
    </section>
</div>
</body>
</html>