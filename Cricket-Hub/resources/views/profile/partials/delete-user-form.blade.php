<section>
    <header class="mb-4">
        <h4 class="text-red-600 dark:text-red-400 font-semibold">
            {{ __('Delete Account') }}
        </h4>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all data will be permanently removed.') }}
        </p>
    </header>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300" placeholder="Enter your password to confirm" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
            <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
        </div>
    </form>
</section>
