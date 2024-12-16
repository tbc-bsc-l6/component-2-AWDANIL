<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // List all players
    public function index()
    {
        $players = Player::all();
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
