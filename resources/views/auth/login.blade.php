<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <iframe src="https://hosting.wialon.com/login.html?access_type=1&css_url=http://localhost:8000/wialon_auth_css/login.css" style="background-image:url(/dskin/images/login/logdo_bg.svg);" width="100%" height="400" name="iframe"></iframe>
</x-guest-layout>
