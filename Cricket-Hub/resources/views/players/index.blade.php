<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players List</title>
</head>
<body>
    <h1>Players List</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('players.create') }}">Add New Player</a>
    <ul>
        @foreach ($players as $player)
            <li>
                {{ $player->name }} - {{ $player->role }} - Batting Average: {{ $player->batting_average }}
                <a href="{{ route('players.edit', $player) }}">Edit</a>
                <form action="{{ route('players.destroy', $player) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Search Form -->
    <form method="GET" action="{{ route('players.index') }}">
        <input type="text" name="search" placeholder="Search players" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <!-- Filter by Role -->
    <form method="GET" action="{{ route('players.index') }}">
        <select name="role" onchange="this.form.submit()">
            <option value="">Filter by Role</option>
            <option value="Batsman" {{ request('role') == 'Batsman' ? 'selected' : '' }}>Batsman</option>
            <option value="Bowler" {{ request('role') == 'Bowler' ? 'selected' : '' }}>Bowler</option>
            <option value="All-Rounder" {{ request('role') == 'All-Rounder' ? 'selected' : '' }}>All-Rounder</option>
        </select>
    </form>

    <!-- Filter by Team -->
    <form method="GET" action="{{ route('players.index') }}">
        <select name="team_id" onchange="this.form.submit()">
            <option value="">Filter by Team</option>
            @foreach (App\Models\Team::all() as $team)
                <option value="{{ $team->id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
    </form>

    <!-- Sorting Links -->
    <h3>Sort By:</h3>
    <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'asc']) }}">Name Ascending</a> |
    <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'desc']) }}">Name Descending</a> |
    <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'asc']) }}">Role Ascending</a> |
    <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'desc']) }}">Role Descending</a>

    <!-- Display Players -->
    <ul>
        @foreach ($players as $player)
            <li>
                {{ $player->name }} - {{ $player->role }}
                @if ($player->team)
                    (Team: {{ $player->team->name }})
                @endif
            </li>
        @endforeach
    </ul>

    <h1>Players</h1>

    @foreach ($players as $player)
        <x-player-card :player="$player" />
    @endforeach
</body>
</html>
