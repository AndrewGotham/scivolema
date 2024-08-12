<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Vote;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteTest extends TestCase
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
    public function it_gets_votes_list(): void
    {
        $votes = Vote::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.votes.index'));

        $response->assertOk()->assertSee($votes[0]->voteable_type);
    }

    /**
     * @test
     */
    public function it_stores_the_vote(): void
    {
        $data = Vote::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.votes.store'), $data);

        $this->assertDatabaseHas('votes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_vote(): void
    {
        $vote = Vote::factory()->create();

        $user = User::factory()->create();

        $data = [
            'upvote' => $this->faker->boolean(),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(route('api.votes.update', $vote), $data);

        $data['id'] = $vote->id;

        $this->assertDatabaseHas('votes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_vote(): void
    {
        $vote = Vote::factory()->create();

        $response = $this->deleteJson(route('api.votes.destroy', $vote));

        $this->assertModelMissing($vote);

        $response->assertNoContent();
    }
}
