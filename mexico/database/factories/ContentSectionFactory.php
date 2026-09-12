<?php

namespace Database\Factories;

use App\Enums\SectionType;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentSection>
 */
class ContentSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content_id' => Content::factory(),
            'section_type' => SectionType::RICH_TEXT,
            'internal_name' => 'Text Section',
            'heading' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}
