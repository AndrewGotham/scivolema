<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Question;

use App\Models\Language;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionControllerTest extends TestCase
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

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_questions(): void
    {
        $questions = Question::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('questions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.questions.index')
            ->assertViewHas('questions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_question(): void
    {
        $response = $this->get(route('questions.create'));

        $response->assertOk()->assertViewIs('app.questions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_question(): void
    {
        $data = Question::factory()
            ->make()
            ->toArray();

        $data['tags'] = json_encode($data['tags']);

        $response = $this->post(route('questions.store'), $data);

        $data['tags'] = $this->castToJson($data['tags']);

        $this->assertDatabaseHas('questions', $data);

        $question = Question::latest('id')->first();

        $response->assertRedirect(route('questions.edit', $question));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_question(): void
    {
        $question = Question::factory()->create();

        $response = $this->get(route('questions.show', $question));

        $response
            ->assertOk()
            ->assertViewIs('app.questions.show')
            ->assertViewHas('question');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_question(): void
    {
        $question = Question::factory()->create();

        $response = $this->get(route('questions.edit', $question));

        $response
            ->assertOk()
            ->assertViewIs('app.questions.edit')
            ->assertViewHas('question');
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

        $data['tags'] = json_encode($data['tags']);

        $response = $this->put(route('questions.update', $question), $data);

        $data['id'] = $question->id;

        $data['tags'] = $this->castToJson($data['tags']);

        $this->assertDatabaseHas('questions', $data);

        $response->assertRedirect(route('questions.edit', $question));
    }

    /**
     * @test
     */
    public function it_deletes_the_question(): void
    {
        $question = Question::factory()->create();

        $response = $this->delete(route('questions.destroy', $question));

        $response->assertRedirect(route('questions.index'));

        $this->assertSoftDeleted($question);
    }
}
