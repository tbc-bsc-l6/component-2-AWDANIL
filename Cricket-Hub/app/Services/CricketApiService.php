<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CricketApiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('CRICAPI_KEY'); // Store API Key in .env file
        $this->baseUrl = 'https://api.cricapi.com/v1/currentMatches/'; // Base URL only
    }

    public function getLiveMatches()
    {
        $response = Http::withOptions(['verify' => false])
            ->get('https://api.cricapi.com/v1/currentMatches', [
                'apikey' => $this->apiKey,
            ]);
    
    $data= $response->json();
    // Check if the response contains data
    if (isset($data['data']) && is_array($data['data'])) {
        $matches = $data['data'];
    } else {
        $matches = []; // Default to empty if no matches
    }

    return view('cricket.index', compact('matches'));
}

    
    


  


    public function getPlayerDetails($playerId)
    {
        // Use 'player' endpoint
        $response = Http::withOptions([
            'verify' => base_path('resources/certificates/cacert.pem'), // Path to SSL certificate
        ])->get($this->baseUrl . 'player', [
            'apikey' => $this->apiKey,
            'pid' => $playerId,
        ]);

        return $response->json();
    }
}
