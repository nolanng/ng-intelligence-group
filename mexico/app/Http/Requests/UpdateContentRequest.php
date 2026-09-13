<?php

namespace App\Http\Requests;

use App\Enums\ContentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContentRequest extends FormRequest
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
            'content_type' => ['sometimes', 'required', Rule::enum(ContentType::class)],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('contents')->ignore($this->route('content'))],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'template' => ['nullable', 'string', 'max:255'],
            'locale' => ['nullable', 'string', 'max:10'],
            'is_featured' => ['boolean'],
            'parent_id' => ['nullable', 'exists:contents,id'],
            'featured_media_id' => ['nullable', 'integer'],
        ];
    }
}
