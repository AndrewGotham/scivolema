<?php

namespace Database\Factories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VoteFactory extends Factory
{
    protected $model = Vote::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'votable_type' => $this->faker->randomElement([
                \App\Models\Question::class,
                \App\Models\Answer::class,
            ]),
            'votable_id' => function (array $item) {
                return app($item['votable_type'])->factory();
            },
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
