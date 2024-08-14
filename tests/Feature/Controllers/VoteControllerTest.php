<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Vote;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_votes(): void
    {
        $votes = Vote::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('votes.index'));

        $response
            ->assertOk()
            ->assertViewIs('admin.vote.index')
            ->assertViewHas('votes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_vote(): void
    {
        $response = $this->get(route('votes.create'));

        $response->assertOk()->assertViewIs('admin.vote.create');
    }

    /**
     * @test
     */
    public function it_stores_the_vote(): void
    {
        $data = Vote::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('votes.store'), $data);

        $this->assertDatabaseHas('votes', $data);

        $vote = Vote::latest('id')->first();

        $response->assertRedirect(route('votes.edit', $vote));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_vote(): void
    {
        $vote = Vote::factory()->create();

        $response = $this->get(route('votes.show', $vote));

        $response
            ->assertOk()
            ->assertViewIs('admin.vote.show')
            ->assertViewHas('vote');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_vote(): void
    {
        $vote = Vote::factory()->create();

        $response = $this->get(route('votes.edit', $vote));

        $response
            ->assertOk()
            ->assertViewIs('admin.vote.edit')
            ->assertViewHas('vote');
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

        $response = $this->put(route('votes.update', $vote), $data);

        $data['id'] = $vote->id;

        $this->assertDatabaseHas('votes', $data);

        $response->assertRedirect(route('votes.edit', $vote));
    }

    /**
     * @test
     */
    public function it_deletes_the_vote(): void
    {
        $vote = Vote::factory()->create();

        $response = $this->delete(route('votes.destroy', $vote));

        $response->assertRedirect(route('votes.index'));

        $this->assertModelMissing($vote);
    }
}
