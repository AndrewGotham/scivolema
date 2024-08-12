<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Question;

use App\Models\Language;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
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
    public function it_gets_questions_list(): void
    {
        $questions = Question::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.questions.index'));

        $response->assertOk()->assertSee($questions[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_question(): void
    {
        $data = Question::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.questions.store'), $data);

        $this->assertDatabaseHas('questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_question(): void
    {
        $question = Question::factory()->create();

        $user = User::factory()->create();
        $language = Language::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'slug' => $this->faker->unique->slug(),
            'body' => $this->faker->text(),
            'views' => $this->faker->numberBetween(0, 8388607),
            'score' => $this->faker->numberBetween(0, 8388607),
            'tags' => [],
            'status' => 'published',
            'status_note' => $this->faker->text(),
            'user_id' => $user->id,
            'language_id' => $language->id,
        ];

        $response = $this->putJson(
            route('api.questions.update', $question),
            $data
        );

        $data['id'] = $question->id;

        $this->assertDatabaseHas('questions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_question(): void
    {
        $question = Question::factory()->create();

        $response = $this->deleteJson(
            route('api.questions.destroy', $question)
        );

        $this->assertSoftDeleted($question);

        $response->assertNoContent();
    }
}
