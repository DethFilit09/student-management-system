<x-guest-layout>
    <h1>Create account ✨</h1>
    <p class="sub">It only takes a few seconds.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="sms-field">
            <label class="sms-label" for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="sms-input @error('name') err @enderror" placeholder="please input your name">
            @error('name')<div class="sms-error">{{ $message }}</div>@enderror
        </div>
        <div class="sms-field">
            <label class="sms-label" for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="sms-input @error('email') err @enderror" placeholder="you@example.com">
            @error('email')<div class="sms-error">{{ $message }}</div>@enderror
        </div>
        <div class="sms-field">
            <label class="sms-label" for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="sms-input @error('password') err @enderror">
            @error('password')<div class="sms-error">{{ $message }}</div>@enderror
        </div>
        <div class="sms-field">
            <label class="sms-label" for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="sms-input">
        </div>
        <button class="sms-btn full">Register</button>
    </form>

    <p class="sms-foot2">Already registered? <a href="{{ route('login') }}">Login</a></p>
</x-guest-layout>
