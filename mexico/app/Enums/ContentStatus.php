<?php

namespace App\Enums;

enum ContentStatus: string
{
    case DRAFT = 'draft';
    case REVIEW = 'review';
    case APPROVED = 'approved';
    case SCHEDULED = 'scheduled';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}
