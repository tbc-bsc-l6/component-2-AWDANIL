<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        // Create 10 teams
        Team::factory(10)->create()->each(function ($team) {
            // Assign 5 players to each team
            Player::factory(5)->create(['team_id' => $team->id]);
        });
    }
}

