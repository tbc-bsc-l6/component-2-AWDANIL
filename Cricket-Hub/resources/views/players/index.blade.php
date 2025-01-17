<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
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

                <!-- Navbar Links -->
                <div class="hidden md:flex space-x-6">
                    <li><a href="/" class="hover:text-teal-400">Home</a></li>
                    <a href="{{ route('dashboard') }}" class="hover:text-teal-400">Dashboard</a>
                    <a href="{{ route('teams.index') }}" class="hover:text-teal-400">Teams</a>
                    <a href="{{ route('profile.edit') }}" class="hover:text-teal-400">My Profile</a>
                    <a href="{{ route('cricket.index') }}" class="hover:text-teal-400">Live Matches</a>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="my-10">
            <!-- Page Title -->
            <h1 class="text-4xl font-bold text-center text-teal-600">Players List</h1>
        </header>

        <!-- Success Message -->
        @if (session('success'))
            <!-- Displays success message after an action (like adding or deleting a player) -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Player Button -->
        <div class="flex justify-end mb-6">
            <!-- Link to the player creation form -->
            <a href="{{ route('players.create') }}" class="bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-700">Add New Player</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-6">
            <!-- Input field to search players by name -->
            <div class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search"
                    placeholder="Search players"
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded focus:ring-teal-500 focus:border-teal-500"
                />
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-700">
                    Search
                </button>
            </div>
        </form>

        <!-- Filter by Role -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-6">
            <!-- Dropdown to filter players by role -->
            <select
                name="role"
                onchange="this.form.submit()"
                class="w-full px-4 py-2 border rounded focus:ring-teal-500 focus:border-teal-500"
            >
                <option value="">Filter by Role</option>
                <option value="Batsman" {{ request('role') == 'Batsman' ? 'selected' : '' }}>Batsman</option>
                <option value="Bowler" {{ request('role') == 'Bowler' ? 'selected' : '' }}>Bowler</option>
                <option value="All-Rounder" {{ request('role') == 'All-Rounder' ? 'selected' : '' }}>All-Rounder</option>
            </select>
        </form>

        <!-- Filter by Team -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-6">
            <!-- Dropdown to filter players by team -->
            <select
                name="team_id"
                onchange="this.form.submit()"
                class="w-full px-4 py-2 border rounded focus:ring-teal-500 focus:border-teal-500"
            >
                <option value="">Filter by Team</option>
                @foreach (App\Models\Team::all() as $team)
                    <option value="{{ $team->id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </form>

        <!-- Sorting Links -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-3">Sort By:</h3>
            <!-- Links for sorting players by name or role -->
            <div class="flex space-x-4">
                <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'asc']) }}" class="text-teal-600 hover:underline">Name Ascending</a>
                <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'desc']) }}" class="text-teal-600 hover:underline">Name Descending</a>
                <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'asc']) }}" class="text-teal-600 hover:underline">Role Ascending</a>
                <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'desc']) }}" class="text-teal-600 hover:underline">Role Descending</a>
            </div>
        </div>

        <!-- Display Players -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($players as $player)
                <!-- Card layout for each player -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h5 class="text-xl font-bold text-teal-600">{{ $player->name }}</h5>
                    <p class="text-gray-700">Role: {{ $player->role }}</p>
                    <p class="text-gray-700">Batting Average: {{ $player->batting_average }}</p>
                    @if ($player->team)
                        <p class="text-gray-700">Team: {{ $player->team->name }}</p>
                    @endif
                    <!-- Action buttons -->
                    <div class="mt-4 flex space-x-2">
                        <a
                            href="{{ route('players.edit', $player) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                        >Edit</a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST">
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

        <!-- Pagination Section -->
        <div class="pagination-wrapper">
            <!-- Laravel's pagination links -->
            {{ $players->links('pagination::default') }}
        </div>
        <div class="pagination-info">
            <!-- Pagination info (e.g., showing X to Y of Z) -->
            Showing {{ $players->firstItem() }} to {{ $players->lastItem() }} of {{ $players->total() }} players
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-10">
            <div class="text-center">
                <p class="text-sm">
                    &copy; {{ date('Y') }} Cricket Hub. All Rights Reserved.
                </p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-teal-400 hover:text-white text-sm">Contact Us</a>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
