<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->word(),
            'views' => $this->faker->randomNumber(),
            'score' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'language_id' => $this->faker->randomNumber(),
        ];
    }
}
