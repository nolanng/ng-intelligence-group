<?php

namespace App\Services;

use App\Enums\ContentStatus;
use App\Models\Content;
use Illuminate\Validation\ValidationException;

class ContentService
{
    /**
     * Submit a draft content for review.
     */
    public function submitForReview(Content $content): Content
    {
        if ($content->status !== ContentStatus::DRAFT) {
            throw ValidationException::withMessages([
                'status' => 'Solo los contenidos en borrador pueden enviarse a revisión.',
            ]);
        }

        $content->update(['status' => ContentStatus::REVIEW]);
        return $content;
    }

    /**
     * Approve a content under review.
     */
    public function approve(Content $content): Content
    {
        if ($content->status !== ContentStatus::REVIEW) {
            throw ValidationException::withMessages([
                'status' => 'Solo los contenidos en revisión pueden ser aprobados.',
            ]);
        }

        $content->update(['status' => ContentStatus::APPROVED]);
        return $content;
    }

    /**
     * Schedule an approved content.
     */
    public function schedule(Content $content, \DateTimeInterface $publishAt): Content
    {
        if ($content->status !== ContentStatus::APPROVED) {
            throw ValidationException::withMessages([
                'status' => 'Solo contenidos aprobados pueden programarse.',
            ]);
        }

        $content->update([
            'status' => ContentStatus::SCHEDULED,
            'published_at' => $publishAt,
        ]);

        return $content;
    }

    /**
     * Publish an approved content.
     */
    public function publish(Content $content): Content
    {
        if (!in_array($content->status, [ContentStatus::APPROVED, ContentStatus::SCHEDULED])) {
            throw ValidationException::withMessages([
                'status' => 'Solo contenidos aprobados o programados pueden ser publicados.',
            ]);
        }

        $content->update([
            'status' => ContentStatus::PUBLISHED,
            'published_at' => now(),
        ]);
        
        return $content;
    }

    /**
     * Archive a published content.
     */
    public function archive(Content $content): Content
    {
        if ($content->status !== ContentStatus::PUBLISHED) {
            throw ValidationException::withMessages([
                'status' => 'Solo los contenidos publicados pueden archivarse.',
            ]);
        }

        $content->update(['status' => ContentStatus::ARCHIVED]);
        return $content;
    }
}
