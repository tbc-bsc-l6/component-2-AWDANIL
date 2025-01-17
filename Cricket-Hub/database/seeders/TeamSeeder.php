<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Seeder;

/**
 * Class TeamSeeder
 *
 * Seeds the `teams` table with initial data and associates players with each team.
 */
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates 10 teams and assigns 5 players to each team.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 teams using the Team factory
        Team::factory(10)->create()->each(function ($team) {
            // Assign 5 players to each team using the Player factory
            Player::factory(5)->create(['team_id' => $team->id]);
        });
    }
}
