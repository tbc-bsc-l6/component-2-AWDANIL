<?php
namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name, // Generates a random name
            'role' => $this->faker->randomElement(['Batsman', 'Bowler', 'All-Rounder']), // Random role
            'batting_average' => $this->faker->randomFloat(2, 10, 50), // Random batting average (e.g., 10.00 to 50.00)
        ];
    }
}
