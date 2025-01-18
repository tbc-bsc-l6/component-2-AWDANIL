<?php

namespace Tests\Unit;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_player()
    {
        $player = Player::create([
            'name' => 'Virat Kohli',
            'role' => 'Batsman',
            'batting_average' => 50.5,
        ]);

        $this->assertDatabaseHas('players', [
            'name' => 'Virat Kohli',
            'role' => 'Batsman',
        ]);
    }

    /** @test */
    public function it_belongs_to_a_team()
    {
        $team = Team::factory()->create();
        $player = Player::factory()->create(['team_id' => $team->id]);

        $this->assertEquals($team->id, $player->team->id);
    }

    /** @test */
    public function it_requires_a_name_to_create_player()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Player::create([
            'role' => 'Batsman',
            'batting_average' => 45.0,
        ]);
    }
}
