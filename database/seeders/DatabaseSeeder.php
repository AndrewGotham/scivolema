<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(LanguageSeeder::class);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        $this->call(PermissionsSeeder::class);
        User::factory(10)->create();
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(VoteSeeder::class);
    }
}
