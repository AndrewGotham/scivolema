<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Language;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_languages_list(): void
    {
        $languages = Language::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.languages.index'));

        $response->assertOk()->assertSee($languages[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_language(): void
    {
        $data = Language::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.languages.store'), $data);

        $this->assertDatabaseHas('languages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_language(): void
    {
        $language = Language::factory()->create();

        $data = [
            'default' => $this->faker->boolean(),
            'fallback' => $this->faker->boolean(),
            'code' => $this->faker->unique->text(255),
            'regional' => $this->faker->text(255),
            'script' => $this->faker->text(255),
            'dir' => $this->faker->text(255),
            'flag' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'english' => $this->faker->text(255),
            'slug' => $this->faker->unique->slug(),
            'available' => $this->faker->boolean(),
            'active' => $this->faker->boolean(),
        ];

        $response = $this->putJson(
            route('api.languages.update', $language),
            $data
        );

        $data['id'] = $language->id;

        $this->assertDatabaseHas('languages', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_language(): void
    {
        $language = Language::factory()->create();

        $response = $this->deleteJson(
            route('api.languages.destroy', $language)
        );

        $this->assertModelMissing($language);

        $response->assertNoContent();
    }
}
