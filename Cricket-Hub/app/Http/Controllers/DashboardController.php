<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::withoutVerifying()->get('https://api.cricapi.com/v1/currentMatches', [
            'apikey' => env('CRICAPI_KEY'),
        ]);

        $data = $response->json();

        $matches = isset($data['data']) && is_array($data['data']) ? $data['data'] : [];

        return view('cricket.index', compact('matches'));
    }
}
