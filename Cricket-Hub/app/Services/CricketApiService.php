<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Class CricketApiService
 *
 * A service class to interact with the CricAPI for fetching live matches and player details.
 */
class CricketApiService
{
    /**
     * @var string The API key for CricAPI.
     */
    protected $apiKey;

    /**
     * @var string The base URL for CricAPI endpoints.
     */
    protected $baseUrl;

    /**
     * CricketApiService constructor.
     *
     * Initializes the API key and base URL from the environment configuration.
     */
    public function __construct()
    {
        $this->apiKey = env('CRICAPI_KEY');
        $this->baseUrl = 'https://api.cricapi.com/v1/';
    }

    /**
     * Get the live cricket matches from the CricAPI.
     *
     * Fetches the current live matches and returns the results as an array.
     *
     * @return array The list of live matches or an empty array if no matches are found.
     */
    public function getLiveMatches()
    {
        $response = Http::withOptions(['verify' => false])
            ->get($this->baseUrl . 'currentMatches', [
                'apikey' => $this->apiKey,
            ]);

        // Decode the response JSON
        $data = $response->json();

        // Return the matches or an empty array if no matches exist
        return isset($data['data']) && is_array($data['data']) ? $data['data'] : [];
    }

    /**
     * Get details of a specific player by their ID.
     *
     * Fetches player details using the 'player' endpoint from CricAPI.
     *
     * @param int $playerId The ID of the player.
     * @return array The player's details or an empty array if the player is not found.
     */
    public function getPlayerDetails($playerId)
    {
        $response = Http::withOptions([
            'verify' => base_path('resources/certificates/cacert.pem'), // Path to SSL certificate
        ])->get($this->baseUrl . 'player', [
            'apikey' => $this->apiKey,
            'pid' => $playerId,
        ]);

        // Return the decoded JSON response
        return $response->json();
    }
}
