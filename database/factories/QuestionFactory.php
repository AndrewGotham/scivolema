<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraphs(3, true),
            'views' => $this->faker->randomNumber(),
            'score' => $this->faker->randomNumber(),
            'user_id' => User::inRandomOrder()->first(),
            'language_id' => Language::inRandomOrder()->first(),
        ];
    }
}
