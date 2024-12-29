<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // List all players
    public function index(Request $request)
    {
        $players = Player::all(); // Fetch all players
        $query = Player::query(); // Start a query for the Player model
    
        // Add Search Functionality
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter by team
        if ($request->filled('team_id')) {
            $query->where('team_id', $request->team_id);
        }
        // Add Sorting Functionality
        if ($request->filled('sort')) {
            $sortBy = $request->sort; // Column to sort by
            $sortDirection = $request->direction === 'desc' ? 'desc' : 'asc'; // Sort direction (asc/desc)
            $query->orderBy($sortBy, $sortDirection);
        }
    
        $players = $query->get(); // Fetch the results
        $players = $query->paginate(12); // Paginate results (10 per page)
        return view('players.index', compact('players'));
    }
    

    // Show form to add a player
    public function create()
    {
        return view('players.create');
    }

    // Save a new player
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'batting_average' => 'nullable|numeric',
        ]);

        Player::create($request->all());
        return redirect()->route('players.index')->with('success', 'Player added successfully!');
    }

    // Show form to edit a player
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    // Update player details
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'batting_average' => 'nullable|numeric',
        ]);

        $player->update($request->all());
        return redirect()->route('players.index')->with('success', 'Player updated successfully!');
    }

    // Delete a player
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }


    


}

