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
        $this->baseUrl = 'https://api.cricapi.com/v1/cricScore/'; // Base URL only
    }

    public function getLiveMatches()
    {
        // Use 'matches' endpoint
        $response = Http::withOutVerifying()->get($this->baseUrl,[
     
            'apikey' => $this->apiKey,
        ]);

        return $response->json();
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
