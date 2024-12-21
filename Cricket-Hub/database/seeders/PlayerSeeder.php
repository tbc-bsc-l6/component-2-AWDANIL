<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 players using the factory
        DB::table('players')->truncate();
        Player::factory(10)->create();
    }
}
