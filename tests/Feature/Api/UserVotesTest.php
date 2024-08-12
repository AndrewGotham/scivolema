<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Vote;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserVotesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_user_votes(): void
    {
        $user = User::factory()->create();
        $votes = Vote::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.votes.index', $user));

        $response->assertOk()->assertSee($votes[0]->voteable_type);
    }

    /**
     * @test
     */
    public function it_stores_the_user_votes(): void
    {
        $user = User::factory()->create();
        $data = Vote::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.votes.store', $user),
            $data
        );

        $this->assertDatabaseHas('votes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $vote = Vote::latest('id')->first();

        $this->assertEquals($user->id, $vote->user_id);
    }
}
