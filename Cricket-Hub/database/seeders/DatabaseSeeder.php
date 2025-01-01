<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the other seeders first
        $this->call([
            PlayerSeeder::class,
            TeamSeeder::class,
        ]);

        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'anilacharya884@gmail.com',
            'password' => bcrypt('Anil12345'),
            'role' => 'admin',
        ]);

        // Create Customer User
        User::create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);
    }
}
