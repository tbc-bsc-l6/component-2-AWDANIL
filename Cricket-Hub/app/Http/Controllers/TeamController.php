<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Display a list of all teams
    public function index(Request $request)
    {
        $query = Team::query(); // Start a query for the Team model
    
        // Add Search Functionality
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        // Filter by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
         }
    
        // Add Sorting Functionality
        if ($request->filled('sort')) {
            $sortBy = $request->sort; // Column to sort by
            $sortDirection = $request->direction === 'desc' ? 'desc' : 'asc'; // Sort direction (asc/desc)
            $query->orderBy($sortBy, $sortDirection);
        }
    
        $teams = $query->get(); // Fetch the results
        return view('teams.index', compact('teams'));
    }
    

    // Show the form for creating a new team
    public function create()
    {
        return view('teams.create');
    }

    // Store a newly created team in the database
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

    // Show the form for editing an existing team
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    // Update an existing team in the database
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

    // Delete a team from the database
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }

}


