<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Cricket Matches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Live Cricket Matches</h1>

        @if (count($matches) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($matches as $match)
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-xl font-bold text-teal-600">{{ $match['name'] }}</h2>
                        <p class="text-gray-700">Status: {{ $match['status'] }}</p>
                        <p class="text-gray-700">Match Type: {{ $match['matchType'] }}</p>
                        <p class="text-gray-700">Venue: {{ $match['venue'] }}</p>
                        <p class="text-gray-700">Date: {{ $match['date'] }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-red-500">No live matches available at the moment.</p>
        @endif
    </div>
</body>
</html>
