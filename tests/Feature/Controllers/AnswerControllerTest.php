<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Answer;

use App\Models\Question;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerControllerTest extends TestCase
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
    public function it_displays_index_view_with_answers(): void
    {
        $answers = Answer::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('answers.index'));

        $response
            ->assertOk()
            ->assertViewIs('site.answer.index')
            ->assertViewHas('answers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_answer(): void
    {
        $response = $this->get(route('answers.create'));

        $response->assertOk()->assertViewIs('site.answer.create');
    }

    /**
     * @test
     */
    public function it_stores_the_answer(): void
    {
        $data = Answer::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('answers.store'), $data);

        $this->assertDatabaseHas('answers', $data);

        $answer = Answer::latest('id')->first();

        $response->assertRedirect(route('site.answer.edit', $answer));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_answer(): void
    {
        $answer = Answer::factory()->create();

        $response = $this->get(route('answers.show', $answer));

        $response
            ->assertOk()
            ->assertViewIs('site.answer.show')
            ->assertViewHas('answer');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_answer(): void
    {
        $answer = Answer::factory()->create();

        $response = $this->get(route('answers.edit', $answer));

        $response
            ->assertOk()
            ->assertViewIs('site.answer.edit')
            ->assertViewHas('answer');
    }

    /**
     * @test
     */
    public function it_updates_the_answer(): void
    {
        $answer = Answer::factory()->create();

        $user = User::factory()->create();
        $question = Question::factory()->create();

        $data = [
            'body' => $this->faker->text(),
            'score' => $this->faker->numberBetween(0, 8388607),
            'best_answer' => $this->faker->boolean(),
            'status' => 'published',
            'pending',
            'rejected',
            'status_note' => $this->faker->text(),
            'user_id' => $user->id,
            'question_id' => $question->id,
        ];

        $response = $this->put(route('answers.update', $answer), $data);

        $data['id'] = $answer->id;

        $this->assertDatabaseHas('answers', $data);

        $response->assertRedirect(route('answers.edit', $answer));
    }

    /**
     * @test
     */
    public function it_deletes_the_answer(): void
    {
        $answer = Answer::factory()->create();

        $response = $this->delete(route('answers.destroy', $answer));

        $response->assertRedirect(route('answers.index'));

        $this->assertModelMissing($answer);
    }
}
