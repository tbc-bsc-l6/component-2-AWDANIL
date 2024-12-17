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
</body>
</html>
