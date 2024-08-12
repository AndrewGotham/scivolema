<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Language;
use App\Models\Question;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageQuestionsTest extends TestCase
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
    public function it_gets_language_questions(): void
    {
        $language = Language::factory()->create();
        $questions = Question::factory()
            ->count(2)
            ->create([
                'language_id' => $language->id,
            ]);

        $response = $this->getJson(
            route('api.languages.questions.index', $language)
        );

        $response->assertOk()->assertSee($questions[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_language_questions(): void
    {
        $language = Language::factory()->create();
        $data = Question::factory()
            ->make([
                'language_id' => $language->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.languages.questions.store', $language),
            $data
        );

        $this->assertDatabaseHas('questions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $question = Question::latest('id')->first();

        $this->assertEquals($language->id, $question->language_id);
    }
}
