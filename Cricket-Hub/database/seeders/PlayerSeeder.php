<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Player;

/**
 * Class PlayerSeeder
 *
 * Seeds the `players` table with initial data using the Player factory.
 */
class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Truncates the `players` table to prevent duplication and generates 10 players using the factory.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the `players` table to remove existing records
        DB::table('players')->truncate();

        // Generate 10 players using the Player factory
        Player::factory(10)->create();
    }
}
