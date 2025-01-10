<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Cricket Matches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-10 text-teal-600">Live Cricket Matches</h1>
        
        @if ($matches && count($matches) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($matches as $match)
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <!-- Match Title -->
                        <h2 class="text-xl font-bold text-gray-800">{{ $match['name'] ?? 'Match Name' }}</h2>
                        
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
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-bold">{{ $match['teams'][0] ?? 'Team 1' }}</h4>
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
                                    <div>
                                        <h4 class="font-bold">{{ $match['teams'][1] ?? 'Team 2' }}</h4>
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

                        <!-- Match Started/Ended Info -->
                        <p class="text-sm text-gray-600 mt-4">
                            <span class="font-semibold">Match Started:</span> {{ $match['matchStarted'] ? 'Yes' : 'No' }} | 
                            <span class="font-semibold">Match Ended:</span> {{ $match['matchEnded'] ? 'Yes' : 'No' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">No live matches available right now. Please check back later.</p>
        @endif
    </div>
</body>
</html>
