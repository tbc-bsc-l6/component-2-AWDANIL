<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background color */
        }
        .container {
            background-color: #cbe4aa; /* White background for the container */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Players List</h1>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('players.create') }}" class="btn btn-success">Add New Player</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search players" value="{{ request('search') }}" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Filter by Role -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-4">
            <select name="role" onchange="this.form.submit()" class="form-control">
                <option value="">Filter by Role</option>
                <option value="Batsman" {{ request('role') == 'Batsman' ? 'selected' : '' }}>Batsman</option>
                <option value="Bowler" {{ request('role') == 'Bowler' ? 'selected' : '' }}>Bowler</option>
                <option value="All-Rounder" {{ request('role') == 'All-Rounder' ? 'selected' : '' }}>All-Rounder</option>
            </select>
        </form>

        <!-- Filter by Team -->
        <form method="GET" action="{{ route('players.index') }}" class="mb-4">
            <select name="team_id" onchange="this.form.submit()" class="form-control">
                <option value="">Filter by Team</option>
                @foreach (App\Models\Team::all() as $team)
                    <option value="{{ $team->id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </form>

        <!-- Sorting Links -->
        <h3 class="mb-3">Sort By:</h3>
        <div class="mb-4">
            <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'asc']) }}" class="btn btn-link">Name Ascending</a>
            <a href="{{ route('players.index', ['sort' => 'name', 'direction' => 'desc']) }}" class="btn btn-link">Name Descending</a>
            <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'asc']) }}" class="btn btn-link">Role Ascending</a>
            <a href="{{ route('players.index', ['sort' => 'role', 'direction' => 'desc']) }}" class="btn btn-link">Role Descending</a>
        </div>

        <!-- Display Players -->
        <div class="row">
            @foreach ($players as $player)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $player->name }}</h5>
                            <p class="card-text">Role: {{ $player->role }}</p>
                            <p class="card-text">Batting Average: {{ $player->batting_average }}</p>
                            @if ($player->team)
                                <p class="card-text">Team: {{ $player->team->name }}</p>
                            @endif
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('players.edit', $player) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('players.destroy', $player) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>