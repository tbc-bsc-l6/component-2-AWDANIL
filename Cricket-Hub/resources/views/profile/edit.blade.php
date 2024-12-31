<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Overview -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex items-center gap-6">
                <img src="https://via.placeholder.com/100" alt="User Avatar" class="w-24 h-24 rounded-full shadow-md border-2 border-gray-300">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                    <p class="text-sm mt-1 text-gray-600 dark:text-gray-400">Member since: {{ $user->created_at->format('F j, Y') }}</p>
                </div>
            </div>

            <!-- Actions Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Edit Profile -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">
                        <i class="fas fa-user-edit text-indigo-500"></i> {{ __('Edit Profile') }}
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Update Password -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">
                        <i class="fas fa-key text-green-500"></i> {{ __('Update Password') }}
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account -->
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-red-600 dark:text-red-400 mb-4">
                        <i class="fas fa-trash-alt text-red-500"></i> {{ __('Delete Account') }}
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} My Application. All Rights Reserved.</p>
        </div>
    </footer>
</x-app-layout>
