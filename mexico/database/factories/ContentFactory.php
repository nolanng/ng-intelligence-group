<?php

namespace Database\Factories;

use App\Enums\ContentStatus;
use App\Enums\ContentType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'content_type' => ContentType::PAGE,
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraphs(3, true),
            'status' => ContentStatus::DRAFT,
            'locale' => 'es-MX',
        ];
    }
}
