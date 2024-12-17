<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>
</head>
<body>
    <h1>Edit Team</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Team Name:</label>
        <input type="text" id="name" name="name" value="{{ $team->name }}" required>

        <label for="coach">Coach:</label>
        <input type="text" id="coach" name="coach" value="{{ $team->coach }}">

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ $team->city }}">

        <button type="submit">Update Team</button>
    </form>
</body>
</html>
