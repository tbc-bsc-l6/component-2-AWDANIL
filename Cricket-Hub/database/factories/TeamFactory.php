<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class TeamFactory
 *
 * A factory class to generate fake data for the Team model.
 */
class TeamFactory extends Factory
{
    /**
     * The name of the model that is being defined.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the default state for the Team model.
     *
     * Generates random data for Team attributes:
     * - `name`: A random city name followed by "Tigers".
     * - `coach`: A random person name.
     * - `city`: A random city name.
     *
     * @return array The default state for the Team model.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city . ' Tigers', // Random city + team name
            'coach' => $this->faker->name, // Random coach name
            'city' => $this->faker->city, // Random city
        ];
    }
}
