<?php

namespace App\Models;

use App\Enums\SectionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'section_type',
        'internal_name',
        'heading',
        'subheading',
        'content',
        'configuration',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'section_type' => SectionType::class,
            'configuration' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function owner()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
