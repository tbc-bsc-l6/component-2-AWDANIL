<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function showApiData()
    {
        // Fetch API response
        $response = Http::withoutVerifying()->get('https://api.cricapi.com/v1/currentMatches', [
            'apikey' => 'bfbe0a69-e2d4-4c23-a743-fbdcd3e4ddec',
        ]);

        // Decode JSON response
        $data = $response->json();

        // Check if the data is valid and available
        $matches = isset($data['data']) && is_array($data['data']) ? $data['data'] : [];

        // Pass the matches to the view
        return view('cricket.index', compact('matches'));
    }
}
