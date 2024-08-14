<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Answer;

use App\Models\Question;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

//class AnswerTest extends TestCase
//{
//    use RefreshDatabase, WithFaker;

    beforeEach(function ()
    {
//        parent::setUp();

        $this->user = User::factory()->create(['email' => 'admin@admin.com']);

//        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    });

    it('can get answers list', function ()
    {
        $answers = Answer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.answers.index'));

        $this->assertOk()->assertSee($answers[0]->status_note, $response);
    });
//
//    /**
//     * @test
//     */
//    public function it_stores_the_answer(): void
//    {
//        $data = Answer::factory()
//            ->make()
//            ->toArray();
//
//        $response = $this->postJson(route('api.answers.store'), $data);
//
//        $this->assertDatabaseHas('answers', $data);
//
//        $response->assertStatus(201)->assertJsonFragment($data);
//    }
//
//    /**
//     * @test
//     */
//    public function it_updates_the_answer(): void
//    {
//        $answer = Answer::factory()->create();
//
//        $user = User::factory()->create();
//        $question = Question::factory()->create();
//
//        $data = [
//            'body' => $this->faker->text(),
//            'score' => $this->faker->numberBetween(0, 8388607),
//            'best_answer' => $this->faker->boolean(),
//            'status' => 'published',
//            'pending',
//            'rejected',
//            'status_note' => $this->faker->text(),
//            'user_id' => $user->id,
//            'question_id' => $question->id,
//        ];
//
//        $response = $this->putJson(route('api.answers.update', $answer), $data);
//
//        $data['id'] = $answer->id;
//
//        $this->assertDatabaseHas('answers', $data);
//
//        $response->assertOk()->assertJsonFragment($data);
//    }
//
//    /**
//     * @test
//     */
//    public function it_deletes_the_answer(): void
//    {
//        $answer = Answer::factory()->create();
//
//        $response = $this->deleteJson(route('api.answers.destroy', $answer));
//
//        $this->assertModelMissing($answer);
//
//        $response->assertNoContent();
//    }
////}
