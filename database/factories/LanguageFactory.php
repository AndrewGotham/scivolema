<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LanguageFactory
{
    protected $model = Language::class;

    public function definition()
    {
        $english = $this->faker->unique()->word();
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'default' => $this->faker->boolean(),
            'fallback' => $this->faker->boolean(),
            'code' => $this->faker->word(),
            'regional' => $this->faker->word(),
            'script' => $this->faker->word(),
            'dir' => $this->faker->word(),
            'flag' => $this->faker->word(),
            'name' => $this->faker->name(),
            'english' => $english,
            'slug' => Str::slug($english),
            'available' => $this->faker->boolean(),
            'active' => $this->faker->boolean(),
        ];
    }
}
