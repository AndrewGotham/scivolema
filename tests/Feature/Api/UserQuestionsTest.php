<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Question;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserQuestionsTest extends TestCase
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
    public function it_gets_user_questions(): void
    {
        $user = User::factory()->create();
        $questions = Question::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.questions.index', $user));

        $response->assertOk()->assertSee($questions[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_user_questions(): void
    {
        $user = User::factory()->create();
        $data = Question::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.questions.store', $user),
            $data
        );

        $this->assertDatabaseHas('questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $question = Question::latest('id')->first();

        $this->assertEquals($user->id, $question->user_id);
    }
}
