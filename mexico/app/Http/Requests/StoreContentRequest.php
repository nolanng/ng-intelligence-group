<?php

namespace App\Http\Requests;

use App\Enums\ContentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content_type' => ['required', Rule::enum(ContentType::class)],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:contents,slug'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'template' => ['nullable', 'string', 'max:255'],
            'locale' => ['nullable', 'string', 'max:10'],
            'is_featured' => ['boolean'],
            'parent_id' => ['nullable', 'exists:contents,id'],
            'featured_media_id' => ['nullable', 'integer'],
            
            'seo_metadata' => ['nullable', 'array'],
            'seo_metadata.meta_title' => ['nullable', 'string', 'max:255'],
            'seo_metadata.meta_description' => ['nullable', 'string'],
            'seo_metadata.canonical_url' => ['nullable', 'url', 'max:255'],
            'seo_metadata.robots_directive' => ['nullable', 'string', Rule::in(['index,follow', 'index,nofollow', 'noindex,follow', 'noindex,nofollow'])],
            'seo_metadata.focus_keyword' => ['nullable', 'string', 'max:255'],
            'seo_metadata.secondary_keywords' => ['nullable', 'string', 'max:255'],
            'seo_metadata.og_title' => ['nullable', 'string', 'max:255'],
            'seo_metadata.og_description' => ['nullable', 'string'],
            'seo_metadata.og_image_id' => ['nullable', 'integer'],
            'seo_metadata.twitter_card' => ['nullable', 'string', Rule::in(['summary', 'summary_large_image'])],
            'seo_metadata.hreflang_group' => ['nullable', 'string', 'max:255'],
            'seo_metadata.structured_data' => ['nullable', 'array'],
            'seo_metadata.include_in_sitemap' => ['nullable', 'boolean'],
            'seo_metadata.sitemap_priority' => ['nullable', 'numeric', 'min:0', 'max:1'],
            'seo_metadata.sitemap_changefreq' => ['nullable', 'string', Rule::in(['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'])],
        ];
    }
}
