<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class PlayerFactory
 *
 * A factory class to generate fake data for the Player model.
 */
class PlayerFactory extends Factory
{
    /**
     * The name of the model that is being defined.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the default state for the Player model.
     *
     * Generates random data for Player attributes:
     * - `name`: A random name.
     * - `role`: A random role from 'Batsman', 'Bowler', or 'All-Rounder'.
     * - `batting_average`: A random batting average between 10.00 and 50.00.
     *
     * @return array The default state for the Player model.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Generates a random name
            'role' => $this->faker->randomElement(['Batsman', 'Bowler', 'All-Rounder']), // Random role
            'batting_average' => $this->faker->randomFloat(2, 10, 50), // Random batting average
        ];
    }
}
