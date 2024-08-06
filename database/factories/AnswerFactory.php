<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => $this->faker->randomNumber(),
            'question_id' => $this->faker->randomNumber(),
            'body' => $this->faker->word(),
            'score' => $this->faker->randomNumber(),
            'best_answer' => $this->faker->boolean(),
        ];
    }
}
