<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
</head>
<body>
    <h1>Edit Player</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('players.update', $player) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $player->name }}" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="{{ $player->role }}" required>

        <label for="batting_average">Batting Average:</label>
        <input type="number" id="batting_average" name="batting_average" value="{{ $player->batting_average }}" step="0.01">

        <button type="submit">Update Player</button>
    </form>
</body>
</html>
