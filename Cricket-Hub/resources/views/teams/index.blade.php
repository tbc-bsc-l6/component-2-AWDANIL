<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
</head>
<body>
    <h1>Teams</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('teams.create') }}">Add New Team</a>

    <ul>
        @foreach ($teams as $team)
            <li>
                <strong>{{ $team->name }}</strong> (Coach: {{ $team->coach }}, City: {{ $team->city }})
                <a href="{{ route('teams.edit', $team) }}">Edit</a>
                <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

     <!-- Search Form -->
     <form method="GET" action="{{ route('teams.index') }}">
        <input type="text" name="search" placeholder="Search teams" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <!-- Sorting Links -->
    <h3>Sort By:</h3>
    <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'asc']) }}">Name Ascending</a> |
    <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'desc']) }}">Name Descending</a>

    <!-- Display Teams -->
    <ul>
        @foreach ($teams as $team)
            <li>{{ $team->name }} (Coach: {{ $team->coach }}, City: {{ $team->city }})</li>
        @endforeach
    </ul>
</body>
</html>
