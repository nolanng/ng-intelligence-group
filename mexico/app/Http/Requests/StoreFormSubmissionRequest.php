<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormSubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'form_id' => ['required', 'exists:forms,id'],
            'content_id' => ['nullable', 'exists:contents,id'],
            'vertical_code' => ['nullable', 'string', 'max:255'],
            
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            
            'state' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'employees' => ['nullable', 'string', 'max:255'],
            'need' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'payload' => ['nullable', 'array'],
            
            'source' => ['nullable', 'string', 'max:255'],
            'medium' => ['nullable', 'string', 'max:255'],
            'campaign' => ['nullable', 'string', 'max:255'],
            'term' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:255'],
            'landing_url' => ['nullable', 'url', 'max:1024'],
            
            'consent_at' => ['required', 'date'],
            '_honeypot' => ['nullable', 'string'],
        ];
    }
}
