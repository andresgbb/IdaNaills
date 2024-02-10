<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4 w-full max-w-md">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
            </div>

            <!-- Login Button -->
            <div class="mb-4">
                <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white rounded-md font-semibold hover:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-100">{{ __('Log in') }}</button>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="text-sm text-center">
                    <a href="{{ route('password.request') }}" class="text-orange-600 hover:text-orange-800">{{ __('Forgot your password?') }}</a>
                </div>
            @endif
        </form>

</x-guest-layout>








