<?php

namespace Tests\Feature;

use App\Enums\ContentStatus;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ContentEditorialFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_submit_draft_for_review()
    {
        $content = Content::factory()->create(['status' => ContentStatus::DRAFT]);
        $service = new ContentService();

        $service->submitForReview($content);

        $this->assertEquals(ContentStatus::REVIEW, $content->fresh()->status);
    }

    public function test_cannot_submit_non_draft_for_review()
    {
        $content = Content::factory()->create(['status' => ContentStatus::PUBLISHED]);
        $service = new ContentService();

        $this->expectException(ValidationException::class);
        $service->submitForReview($content);
    }

    public function test_can_approve_content_under_review()
    {
        $content = Content::factory()->create(['status' => ContentStatus::REVIEW]);
        $service = new ContentService();

        $service->approve($content);

        $this->assertEquals(ContentStatus::APPROVED, $content->fresh()->status);
    }

    public function test_can_publish_approved_content()
    {
        $content = Content::factory()->create(['status' => ContentStatus::APPROVED]);
        $service = new ContentService();

        $service->publish($content);

        $this->assertEquals(ContentStatus::PUBLISHED, $content->fresh()->status);
        $this->assertNotNull($content->fresh()->published_at);
    }

    public function test_can_archive_published_content()
    {
        $content = Content::factory()->create(['status' => ContentStatus::PUBLISHED]);
        $service = new ContentService();

        $service->archive($content);

        $this->assertEquals(ContentStatus::ARCHIVED, $content->fresh()->status);
    }
}
