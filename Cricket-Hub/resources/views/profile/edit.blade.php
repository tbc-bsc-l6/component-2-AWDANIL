<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Overview Section -->
            <div class="p-6 bg-gradient-to-r from-teal-500 to-blue-500 text-white rounded-lg shadow-lg mb-8 flex items-center gap-6">
                <img src="https://via.placeholder.com/100" alt="User Avatar" class="w-24 h-24 rounded-full shadow-lg">
                <div>
                    <h3 class="text-3xl font-bold">{{ $user->name }}</h3>
                    <p class="text-sm">{{ $user->email }}</p>
                    <p class="text-sm mt-1">Member since: {{ $user->created_at->format('F j, Y') }}</p>
                </div>
            </div>

            <!-- Profile Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Edit Profile -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">
                        {{ __('Edit Profile') }}
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Update Password -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">
                        {{ __('Update Password') }}
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-red-600 dark:text-red-400 mb-4">
                        {{ __('Delete Account') }}
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} My Application. All Rights Reserved.</p>
        </div>
    </footer>
</x-app-layout>
