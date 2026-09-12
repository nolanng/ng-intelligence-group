<?php

namespace App\Enums;

enum SectionType: string
{
    case HERO = 'hero';
    case RICH_TEXT = 'rich_text';
    case BENEFITS = 'benefits';
    case FEATURES = 'features';
    case STATS = 'stats';
    case PROCESS = 'process';
    case INDUSTRY = 'industry';
    case VIDEO = 'video';
    case FAQ = 'faq';
    case CTA = 'cta';
    case RESOURCE = 'resource';
    case RELATED_CONTENT = 'related_content';
    case FORM = 'form';
}
