<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

/**
 * Class TeamController
 *
 * Handles the CRUD operations and other functionalities related to the Team model.
 */
class TeamController extends Controller
{
    /**
     * Display a listing of all teams.
     *
     * Supports search, filtering, and sorting functionality.
     *
     * @param Request $request The HTTP request containing optional query parameters:
     *                         - `search`: (string) Search term to filter teams by name.
     *                         - `city`: (string) Filter teams by city.
     *                         - `sort`: (string) Column name to sort the teams.
     *                         - `direction`: (string) Sort direction, either 'asc' or 'desc'.
     * @return \Illuminate\View\View The view displaying the list of teams.
     */
    public function index(Request $request)
    {
        // Initialize the query for fetching teams
        $query = Team::query();

        // Add search functionality (filters teams by name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter teams by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Add sorting functionality
        if ($request->filled('sort')) {
            $sortBy = $request->sort;
            $sortDirection = $request->direction === 'desc' ? 'desc' : 'asc';
            $query->orderBy($sortBy, $sortDirection);
        }

        // Paginate the results (12 per page)
        $teams = $query->paginate(12);

        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\View\View The view containing the team creation form.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created team in the database.
     *
     * Validates the request data before storing the team.
     *
     * @param Request $request The HTTP request containing the new team's data:
     *                         - `name`: (string) Required. The name of the team.
     *                         - `coach`: (string|null) Optional. The coach of the team.
     *                         - `city`: (string|null) Optional. The city of the team.
     * @return \Illuminate\Http\RedirectResponse Redirects to the team list with a success message.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        Team::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    /**
     * Show the form for editing an existing team.
     *
     * @param Team $team The team to be edited.
     * @return \Illuminate\View\View The view containing the team editing form.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update an existing team in the database.
     *
     * Validates the request data before updating the team.
     *
     * @param Request $request The HTTP request containing the updated team's data:
     *                         - `name`: (string) Required. The name of the team.
     *                         - `coach`: (string|null) Optional. The coach of the team.
     *                         - `city`: (string|null) Optional. The city of the team.
     * @param Team $team The team to be updated.
     * @return \Illuminate\Http\RedirectResponse Redirects to the team list with a success message.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'coach' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        $team->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }

    /**
     * Delete a team from the database.
     *
     * @param Team $team The team to be deleted.
     * @return \Illuminate\Http\RedirectResponse Redirects to the team list with a success message.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }
}
