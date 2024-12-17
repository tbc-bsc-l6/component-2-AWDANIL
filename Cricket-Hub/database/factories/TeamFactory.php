<?php
namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'name' => $this->faker->city . ' Tigers', // Random city + team name
            'coach' => $this->faker->name, // Random coach name
            'city' => $this->faker->city, // Random city
        ];
    }
}
