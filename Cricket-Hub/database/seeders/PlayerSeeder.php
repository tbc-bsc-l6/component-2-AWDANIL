<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        // Generate 50 players using the factory
        Player::factory(10)->create();
    }
}
