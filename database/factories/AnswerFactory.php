<?php

namespace Database\Factories;

use App\Enums\AnswerStatus;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'question_id' => Question::inRandomOrder()->first() ?: $this->faker->randomNumber(),
//            'question_id' => Question::inRandomOrder()->first(),
            'body' => $this->faker->text(),
            'score' => $this->faker->randomNumber(),
            'best_answer' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(AnswerStatus::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
