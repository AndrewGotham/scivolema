<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Answer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAnswersTest extends TestCase
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
    public function it_gets_user_answers(): void
    {
        $user = User::factory()->create();
        $answers = Answer::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.answers.index', $user));

        $response->assertOk()->assertSee($answers[0]->status_note);
    }

    /**
     * @test
     */
    public function it_stores_the_user_answers(): void
    {
        $user = User::factory()->create();
        $data = Answer::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.answers.store', $user),
            $data
        );

        $this->assertDatabaseHas('answers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $answer = Answer::latest('id')->first();

        $this->assertEquals($user->id, $answer->user_id);
    }
}
