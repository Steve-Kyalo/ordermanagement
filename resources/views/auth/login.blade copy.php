<x-guest-layout>
    <!-- Session Status -->
   <style>
    .header {
    background-image: url(/dskin/images/login/logo_bg.svg);
    display:none;
    }
   </style>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <iframe src="https://hosting.wialon.com/login.html?access_type=1&css_url=http://localhost:8000/wialon_auth_css/login.css" style="background-image:url(/dskin/images/login/logdo_bg.svg);" width="100%" height="400" name="iframe" title="This is my video"></iframe>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div style="margin:20px;">
            <x-input-label class="labels" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div style="margin:20px;" class="mt-4">
            <x-input-label class="labels" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div style="margin:20px;" class="block mt-4">
            <label for="remember_me" class="inline-flex items-center labels">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div style="margin:20px;" class="flex items-center justify-end mt-4">
            <!-- @if (Route::has('password.request'))
                <a class="labels underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif -->

            <x-primary-button class="ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
