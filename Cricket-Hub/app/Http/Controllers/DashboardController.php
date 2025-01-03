<?php

namespace App\Http\Controllers;

use App\Services\CricketApiService;

class DashboardController extends Controller
{
    public function index(CricketApiService $cricketApiService)
    {
        $liveMatches = $cricketApiService->getLiveMatches();
    
        if (is_null($liveMatches)) {
            return view('cricket/index', ['error' => 'No data available.']);
        }
    
        return view('cricket/index', ['matches' => $liveMatches]);
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

        return view('cricket/index', [
            'matches' => $liveMatches,
            'message' => count($liveMatches) > 0 ? '' : 'No live matches currently available.',
        ]);
    } else {
        return view('cricket/index', [
            'matches' => [],
            'message' => 'No matches available at the moment.',
        ]);
    }
}
}