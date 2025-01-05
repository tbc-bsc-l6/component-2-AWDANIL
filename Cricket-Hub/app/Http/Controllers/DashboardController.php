<?php

namespace App\Http\Controllers;

use App\Services\CricketApiService;

class DashboardController extends Controller
{
    public function index(CricketApiService $cricketApiService)
{
    $response = $cricketApiService->getLiveMatches();

    if ($response && isset($response['status']) && $response['status'] === 'success') {
        $matches = $response['data']; // Extract the matches
    } else {
        $matches = [];
    }

    return view('<cricket>index', compact('matches'));
}

    
    
    
    public function fetchLiveMatches(CricketApiService $cricketApiService)
{
    $response = $cricketApiService->getLiveMatches();

    // Debugging output
    dd($response);

    if (isset($response['data']) && count($response['data']) > 0) {
        $liveMatches = array_filter($response['data'], function ($match) {
            return strtolower($match['status']) === 'live';
        });

        return view('<cricket>index', [
            'matches' => $liveMatches,
            'message' => count($liveMatches) > 0 ? '' : 'No live matches currently available.',
        ]);
    } else {
        return view('<cricket>index', [
            'matches' => [],
            'message' => 'No matches available at the moment.',
        ]);
    }
}
}