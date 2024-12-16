<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
</head>
<body>
    <h1>Add Player</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required>

        <label for="batting_average">Batting Average:</label>
        <input type="number" id="batting_average" name="batting_average" step="0.01">

        <button type="submit">Add Player</button>
    </form>
</body>
</html>
