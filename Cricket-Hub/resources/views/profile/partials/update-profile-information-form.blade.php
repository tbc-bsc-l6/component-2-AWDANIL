<section>
    <header class="mb-4">
        <h4 class="text-gray-700 dark:text-gray-200 font-semibold text-lg">
            {{ __('Profile Information') }}
        </h4>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-200" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-200" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md shadow-md transition">
                Save Changes
            </button>
        </div>
    </form>
</section>
