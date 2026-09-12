<?php

namespace App\Models;

use App\Enums\ContentStatus;
use App\Enums\ContentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'author_id',
        'parent_id',
        'featured_media_id',
        'content_type',
        'title',
        'slug',
        'excerpt',
        'body',
        'status',
        'template',
        'locale',
        'sort_order',
        'is_featured',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'content_type' => ContentType::class,
            'status' => ContentStatus::class,
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function parent()
    {
        return $this->belongsTo(Content::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Content::class, 'parent_id');
    }

    public function sections()
    {
        return $this->hasMany(ContentSection::class)->orderBy('sort_order');
    }
}
