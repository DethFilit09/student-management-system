<x-guest-layout>
    <h1>Welcome back 👋</h1>
    <p class="sub">Log in to manage your students.</p>

    @if (session('status'))
        <div class="sms-error" style="color:#047857;margin-bottom:12px">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="sms-field">
            <label class="sms-label" for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" readonly onfocus="this.removeAttribute('readonly')"
                   class="sms-input @error('email') err @enderror" placeholder="you@example.com">
            @error('email')<div class="sms-error">{{ $message }}</div>@enderror
        </div>
        <div class="sms-field">
            <label class="sms-label" for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')"
                   class="sms-input @error('password') err @enderror" placeholder="••••••••">
            @error('password')<div class="sms-error">{{ $message }}</div>@enderror
        </div>
        <label class="sms-check"><input type="checkbox" name="remember"> Remember me</label>
        <button class="sms-btn full">Login</button>
    </form>

    <p class="sms-foot2">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot your password?</a><br><br>
        @endif
        No account yet? <a href="{{ route('register') }}">Register</a>
    </p>
</x-guest-layout>