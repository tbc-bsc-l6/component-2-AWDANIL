<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

/**
 * Class DatabaseSeeder
 *
 * The main seeder class that seeds the database with initial data.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Calls other seeders and creates default users.
     *
     * @return void
     */
    public function run()
    {
        // Call the other seeders
        $this->call([
            PlayerSeeder::class,
            TeamSeeder::class,
        ]);

        // Create an Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'anilacharya884@gmail.com',
            'password' => bcrypt('Anil12345'), // Securely hash the password
            'role' => 'admin', // Set the role as admin
        ]);

        // Create a Customer User
        User::create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'), // Securely hash the password
            'role' => 'customer', // Set the role as customer
        ]);
    }
}
