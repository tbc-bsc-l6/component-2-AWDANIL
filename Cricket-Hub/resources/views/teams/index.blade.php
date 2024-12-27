<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background color */
        }
        .container {
            background-color: #7dded1; /* White background for the container */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Teams</h1>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('teams.create') }}" class="btn btn-success">Add New Team</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('teams.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search teams" value="{{ request('search') }}" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Filter by City -->
        <form method="GET" action="{{ route('teams.index') }}" class="mb-4">
            <select name="city" onchange="this.form.submit()" class="form-control">
                <option value="">Filter by City</option>
                <option value="New York" {{ request('city') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="Los Angeles" {{ request('city') == 'Los Angeles' ? 'selected' : '' }}>Los Angeles</option>
                <option value="Chicago" {{ request('city') == 'Chicago' ? 'selected' : '' }}>Chicago</option>
            </select>
        </form>

        <!-- Sorting Links -->
        <h3 class="mb-3">Sort By:</h3>
        <div class="mb-4">
            <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'asc']) }}" class="btn btn-link">Name Ascending</a>
            <a href="{{ route('teams.index', ['sort' => 'name', 'direction' => 'desc']) }}" class="btn btn-link">Name Descending</a>
        </div>

        <!-- Display Teams -->
        <div class="row">
            @foreach ($teams as $team)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $team->name }}</h5>
                            <p class="card-text">Coach: {{ $team->coach }}</p>
                            <p class="card-text">City: {{ $team->city }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display: inline;">
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