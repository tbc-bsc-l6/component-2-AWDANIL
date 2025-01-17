<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-10.5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Navbar Section -->
        <nav class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="#" class="text-xl font-bold">Cricket Hub</a>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6">
                    <li><a href="/" class="hover:text-teal-400">Home</a></li>
                    <a href="{{ route('dashboard') }}" class="hover:text-teal-400">Dashboard</a>
                    <a href="{{ route('players.index') }}" class="hover:text-teal-400">Players</a>
                    <a href="{{ route('profile.edit') }}" class="hover:text-teal-400">My Profile</a>
                    <a href="{{ route('cricket.index') }}" class="hover:text-teal-400">Live Matches</a>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="my-10">
            <!-- Page Title -->
            <h1 class="text-4xl font-bold text-center text-teal-600">Teams</h1>
        </header>

        <!-- Success Message -->
        @if (session('success'))
            <!-- Displays success message after an action like creating or deleting a team -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Team Button -->
        <div class="flex justify-end mb-6">
            <!-- Link to create a new team -->
            <a href="{{ route('teams.create') }}" class="bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-700">Add New Team</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('teams.index') }}" class="mb-6">
            <!-- Input for searching teams by name -->
            <div class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search"
                    placeholder="Search teams"
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded focus:ring-teal-500 focus:border-teal-500"
                />
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-700">
                    Search
                </button>
            </div>
        </form>

        <!-- Filter by City -->
        <form method="GET" action="{{ route('teams.index') }}" class="mb-6">
            <!-- Dropdown to filter teams by city -->
            <select
                name="city"
                onchange="this.form.submit()"
                class="w-full px-4 py-2 border rounded focus:ring-teal-500 focus:border-teal-500"
            >
                <option value="">Filter by City</option>
                <option value="New York" {{ request('city') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="Los Angeles" {{ request('city') == 'Los Angeles' ? 'selected' : '' }}>Los Angeles</option>
                <option value="Chicago" {{ request('city') == 'Chicago' ? 'selected' : '' }}>Chicago</option>
            </select>
        </form>

        <!-- Sorting Links -->
        <div class="mb-6">
            <!-- Links to sort teams by name -->
            <h3 class="text-lg font-semibold mb-3">Sort By:</h3>
            <div class="flex space-x-4">
                <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'asc']) }}" class="text-teal-600 hover:underline">Name Ascending</a>
                <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'desc']) }}" class="text-teal-600 hover:underline">Name Descending</a>
            </div>
        </div>

        <!-- Display Teams -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($teams as $team)
                <!-- Team Card -->
                <div class="bg-white shadow rounded-lg p-6">
                    <!-- Team Details -->
                    <h5 class="text-xl font-bold text-teal-600">{{ $team->name }}</h5>
                    <p class="text-gray-700">Coach: {{ $team->coach }}</p>
                    <p class="text-gray-700">City: {{ $team->city }}</p>

                    <!-- Actions -->
                    <div class="mt-4 flex space-x-2">
                        <!-- Edit Team -->
                        <a
                            href="{{ route('teams.edit', $team) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                        >Edit</a>

                        <!-- Delete Team -->
                        <form action="{{ route('teams.destroy', $team) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-10">
            <!-- Laravel pagination -->
            {{ $teams->links('pagination::default') }}
        </div>

        <!-- Footer Section -->
        <footer class="bg-gray-900 text-white py-10">
            <div class="text-center">
                <!-- Footer Text -->
                <p class="text-sm">
                    &copy; {{ date('Y') }} Cricket Hub. All Rights Reserved.
                </p>

                <!-- Footer Links -->
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Contact Us</a>
                </div>

                <!-- Social Media Icons -->
                <div class="mt-6">
                    <p class="text-sm">Follow Us:</p>
                    <div class="flex justify-center space-x-6 mt-4">
                        <a href="#" class="text-teal-400 hover:text-white">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-teal-400 hover:text-white">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-teal-400 hover:text-white">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#" class="text-teal-400 hover:text-white">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
