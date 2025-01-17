<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Cricket Matches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-12">
        <!-- Page Title -->
        <h1 class="text-5xl font-bold text-center mb-12 text-teal-600 underline decoration-teal-300 decoration-wavy">
            Live Cricket Matches
        </h1>

        <!-- Matches Grid -->
        @if ($matches && count($matches) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($matches as $match)
                    <!-- Individual Match Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                        <!-- Match Title -->
                        <h2 class="text-2xl font-bold text-gray-800">{{ $match['name'] ?? 'Match Name' }}</h2>

                        <!-- Match Status -->
                        <p class="text-sm text-gray-600 mt-2">
                            <span class="font-semibold">Status:</span> {{ $match['status'] ?? 'Unknown' }}
                        </p>

                        <!-- Venue -->
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold">Venue:</span> {{ $match['venue'] ?? 'Unknown Venue' }}
                        </p>

                        <!-- Match Date and Time -->
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold">Date:</span> {{ $match['date'] ?? 'N/A' }} |
                            <span class="font-semibold">Time (GMT):</span> {{ $match['dateTimeGMT'] ?? 'N/A' }}
                        </p>

                        <!-- Teams and Scores -->
                        <div class="mt-4">
                            @if (!empty($match['teams']) && is_array($match['teams']))
                                <div class="flex items-center justify-between space-x-4">
                                    <!-- Team 1 -->
                                    <div>
                                        <h4 class="font-bold text-lg text-teal-500">{{ $match['teams'][0] ?? 'Team 1' }}</h4>
                                        @foreach ($match['score'] ?? [] as $score)
                                            @if (str_contains($score['inning'], $match['teams'][0]))
                                                <p class="text-sm text-gray-700">
                                                    <span class="font-semibold">Runs:</span> {{ $score['r'] ?? 0 }},
                                                    <span class="font-semibold">Wickets:</span> {{ $score['w'] ?? 0 }},
                                                    <span class="font-semibold">Overs:</span> {{ $score['o'] ?? 0 }}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Team 2 -->
                                    <div>
                                        <h4 class="font-bold text-lg text-teal-500">{{ $match['teams'][1] ?? 'Team 2' }}</h4>
                                        @foreach ($match['score'] ?? [] as $score)
                                            @if (str_contains($score['inning'], $match['teams'][1]))
                                                <p class="text-sm text-gray-700">
                                                    <span class="font-semibold">Runs:</span> {{ $score['r'] ?? 0 }},
                                                    <span class="font-semibold">Wickets:</span> {{ $score['w'] ?? 0 }},
                                                    <span class="font-semibold">Overs:</span> {{ $score['o'] ?? 0 }}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Match Info -->
                        <p class="text-sm text-gray-600 mt-4">
                            <span class="font-semibold">Match Started:</span> {{ $match['matchStarted'] ? 'Yes' : 'No' }} |
                            <span class="font-semibold">Match Ended:</span> {{ $match['matchEnded'] ? 'Yes' : 'No' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Matches Message -->
            <p class="text-center text-gray-600">No live matches available right now. Please check back later.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6 mt-12">
        <div class="text-center">
            <p class="text-sm">© 2025 Live Cricket Hub. All rights reserved.</p>
            <p class="text-xs">
                Powered by <a href="https://cricapi.com" class="text-teal-400 hover:underline">CricAPI</a>.
            </p>
        </div>
    </footer>
</body>

</html>
