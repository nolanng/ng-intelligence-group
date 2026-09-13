<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeoMetadata extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'meta_title',
        'meta_description',
        'canonical_url',
        'robots_directive',
        'focus_keyword',
        'secondary_keywords',
        'og_title',
        'og_description',
        'og_image_id',
        'twitter_card',
        'hreflang_group',
        'structured_data',
        'include_in_sitemap',
        'sitemap_priority',
        'sitemap_changefreq',
    ];

    protected $casts = [
        'structured_data' => 'array',
        'include_in_sitemap' => 'boolean',
        'sitemap_priority' => 'decimal:2',
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
