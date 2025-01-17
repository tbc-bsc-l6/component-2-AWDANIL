<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

/**
 * Class DashboardController
 *
 * Handles the display of current cricket matches fetched from an external API.
 */
class DashboardController extends Controller
{
    /**
     * Fetch and display current cricket matches.
     *
     * Makes a GET request to the external API to retrieve current cricket matches.
     *
     * @return \Illuminate\View\View The view displaying the list of matches.
     */
    public function index()
    {
        // Fetch data from the external API
        $response = Http::withoutVerifying()->get('https://api.cricapi.com/v1/currentMatches', [
            'apikey' => env('CRICAPI_KEY'), // Fetch API key from environment variables
        ]);

        // Decode the JSON response
        $data = $response->json();

        // Extract match data or set to an empty array if not available
        $matches = isset($data['data']) && is_array($data['data']) ? $data['data'] : [];

        // Pass match data to the view
        return view('cricket.index', compact('matches'));
    }
}
