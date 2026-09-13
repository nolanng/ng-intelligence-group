<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'content_id',
        'vertical_code',
        'name',
        'company',
        'email',
        'phone',
        'state',
        'industry',
        'employees',
        'need',
        'message',
        'payload',
        'source',
        'medium',
        'campaign',
        'term',
        'content',
        'landing_url',
        'consent_at',
        'status',
        'assigned_to',
        'ip_hash',
    ];

    protected $casts = [
        'payload' => 'array',
        'consent_at' => 'datetime',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
