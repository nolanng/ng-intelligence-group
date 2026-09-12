<?php

namespace App\Enums;

enum ContentType: string
{
    case PAGE = 'page';
    case SOLUTION = 'solution';
    case ARTICLE = 'article';
    case RESOURCE = 'resource';
    case CASE_STUDY = 'case_study';
    case VIDEO = 'video';
    case FAQ = 'faq';
    case LANDING = 'landing';
}
