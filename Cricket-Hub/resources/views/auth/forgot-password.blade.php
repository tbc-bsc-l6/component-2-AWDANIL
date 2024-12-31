<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-500 to-teal-500">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-4">{{ __('Forgot Password?') }}</h2>
            <p class="text-center text-gray-600 mb-6">
                {{ __('No problem. Enter your email address below, and we’ll send you a password reset link.') }}
            </p>
            <script src="https://cdn.tailwindcss.com"></script>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
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
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Reset Password Button -->
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full bg-teal-500 text-white py-3 rounded-lg font-semibold shadow-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-300 transition"
                    >
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>

                <!-- Back to Login -->
                <div class="text-center mt-6">
                    <a
                        href="{{ route('login') }}"
                        class="text-teal-500 hover:underline hover:text-teal-700 text-sm"
                    >
                        {{ __('Back to Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
