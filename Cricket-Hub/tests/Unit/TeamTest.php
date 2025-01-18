<?php

namespace Tests\Unit;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_team()
    {
        $team = Team::create([
            'name' => 'India',
            'coach' => 'Rahul Dravid',
            'city' => 'Mumbai',
        ]);

        $this->assertDatabaseHas('teams', [
            'name' => 'India',
            'coach' => 'Rahul Dravid',
        ]);
    }

    /** @test */
    public function it_has_many_players()
    {
        $team = Team::factory()->create();
        $players = Player::factory(3)->create(['team_id' => $team->id]);

        $this->assertCount(3, $team->players);
    }

    /** @test */
    public function it_requires_a_name_to_create_team()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Team::create([
            'coach' => 'John Doe',
            'city' => 'London',
        ]);
    }
}
