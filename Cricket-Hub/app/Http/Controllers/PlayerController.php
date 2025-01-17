<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

/**
 * Class PlayerController
 *
 * Handles the CRUD operations and other functionalities for the Player model.
 */
class PlayerController extends Controller
{
    /**
     * Display a listing of all players.
     *
     * Supports search, filtering by role or team, and sorting functionality.
     *
     * @param Request $request The HTTP request containing optional query parameters:
     *                         - `search`: (string) Search term to filter players by name.
     *                         - `role`: (string) Filter players by role.
     *                         - `team_id`: (integer) Filter players by team.
     *                         - `sort`: (string) Column name to sort the players.
     *                         - `direction`: (string) Sort direction, either 'asc' or 'desc'.
     * @return \Illuminate\View\View The view displaying the list of players.
     */
    public function index(Request $request)
    {
        // Initialize the query for fetching players
        $query = Player::query();

        // Add search functionality (filters players by name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter players by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter players by team
        if ($request->filled('team_id')) {
            $query->where('team_id', $request->team_id);
        }

        // Add sorting functionality
        if ($request->filled('sort')) {
            $sortBy = $request->sort;
            $sortDirection = $request->direction === 'desc' ? 'desc' : 'asc';
            $query->orderBy($sortBy, $sortDirection);
        }

        // Paginate the results (12 per page)
        $players = $query->paginate(12);

        return view('players.index', compact('players'));
    }

    /**
     * Show the form to create a new player.
     *
     * @return \Illuminate\View\View The view containing the player creation form.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created player in the database.
     *
     * Validates the request data before storing the player.
     *
     * @param Request $request The HTTP request containing the new player's data:
     *                         - `name`: (string) Required. The name of the player.
     *                         - `role`: (string) Required. The role of the player.
     *                         - `batting_average`: (float|null) Optional. The batting average of the player.
     * @return \Illuminate\Http\RedirectResponse Redirects to the player list with a success message.
     */
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

    /**
     * Show the form to edit an existing player.
     *
     * @param Player $player The player to be edited.
     * @return \Illuminate\View\View The view containing the player editing form.
     */
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    /**
     * Update the details of an existing player in the database.
     *
     * Validates the request data before updating the player.
     *
     * @param Request $request The HTTP request containing the updated player's data:
     *                         - `name`: (string) Required. The name of the player.
     *                         - `role`: (string) Required. The role of the player.
     *                         - `batting_average`: (float|null) Optional. The batting average of the player.
     * @param Player $player The player to be updated.
     * @return \Illuminate\Http\RedirectResponse Redirects to the player list with a success message.
     */
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

    /**
     * Delete a player from the database.
     *
     * @param Player $player The player to be deleted.
     * @return \Illuminate\Http\RedirectResponse Redirects to the player list with a success message.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }
}
