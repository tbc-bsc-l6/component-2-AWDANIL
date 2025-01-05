<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Matches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Header -->
    <header class="mb-8 text-center">
        <h1 class="text-4xl font-bold text-teal-600">Live Cricket Matches</h1>
        <p class="text-gray-600 mt-2">Stay updated with the latest matches.</p>
    </header>

    @if ($matches && count($matches) > 0)
        <!-- Matches Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($matches as $match)
                <div class="bg-white shadow rounded-lg p-6">
                    <h5 class="text-xl font-bold text-teal-600">{{ $match['name'] ?? 'Match Name' }}</h5>
                    <p class="text-gray-700">Type: {{ $match['matchType'] ?? 'Unknown' }}</p>
                    <p class="text-gray-700">Venue: {{ $match['venue'] ?? 'Unknown' }}</p>
                    <p class="text-gray-700">Date: {{ $match['date'] ?? 'Unknown' }}</p>
                    <p class="text-gray-700">Status: {{ $match['status'] ?? 'Unknown' }}</p>

                    @if (isset($match['score']))
                        <p class="text-gray-700">Score: {{ $match['score']['r'] ?? '-' }}/{{ $match['score']['w'] ?? '-' }} ({{ $match['score']['o'] ?? '-' }} overs)</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600">No live matches currently available.</p>
    @endif
</div>

</body>
</html>
