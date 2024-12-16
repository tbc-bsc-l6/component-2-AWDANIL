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
</body>
</html>
