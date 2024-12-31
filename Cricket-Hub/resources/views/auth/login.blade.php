<x-guest-layout>
    <!-- Login Page -->
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-500 to-teal-500">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-700">{{ __('Welcome Back') }}</h2>
            <p class="text-center text-gray-500 mb-6">{{ __('Login to your account') }}</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
             <script src="https://cdn.tailwindcss.com"></script>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-teal-500 shadow-sm focus:ring-teal-300"
                            name="remember"
                        >
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a
                            class="text-sm text-teal-500 hover:underline hover:text-teal-700"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full bg-teal-500 text-white py-3 rounded-lg font-semibold shadow-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-300 transition"
                    >
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <p class="mt-6 text-sm text-center text-gray-600">
                        {{ __("Don't have an account?") }}
                        <a
                            href="{{ route('register') }}"
                            class="text-teal-500 hover:underline hover:text-teal-700"
                        >
                            {{ __('Register') }}
                        </a>
                    </p>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>
