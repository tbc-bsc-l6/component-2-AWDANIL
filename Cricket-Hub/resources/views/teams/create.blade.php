<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Team</title>
</head>
<body>
    <h1>Add New Team</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <label for="name">Team Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="coach">Coach:</label>
        <input type="text" id="coach" name="coach">

        <label for="city">City:</label>
        <input type="text" id="city" name="city">

        <button type="submit">Create Team</button>
    </form>
</body>
</html>
