<?php

namespace Tests\Feature;

use App\Enums\SectionType;
use App\Models\Content;
use App\Models\ContentSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_content_can_have_multiple_sections()
    {
        $content = Content::factory()->create();

        ContentSection::factory()->create([
            'content_id' => $content->id,
            'section_type' => SectionType::HERO,
            'sort_order' => 1,
            'configuration' => ['background' => 'dark'],
        ]);

        ContentSection::factory()->create([
            'content_id' => $content->id,
            'section_type' => SectionType::RICH_TEXT,
            'sort_order' => 2,
        ]);

        $this->assertCount(2, $content->sections);
        
        $heroSection = $content->sections->first();
        $this->assertEquals(SectionType::HERO, $heroSection->section_type);
        $this->assertEquals('dark', $heroSection->configuration['background']);
    }
}
