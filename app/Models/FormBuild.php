<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormBuild extends Model
{
    protected $fillable = [
        'form_template_id',
        'field_label',
        'field_name',
        'field_type',
        'field_options',
        'is_required',
        'validation_rules',
        'default_value',
        'order',
        'is_visible',
        'placeholder',
        'help_text',
    ];

    protected $casts = [
        'field_options' => 'array',
        'is_required'   => 'boolean',
        'is_visible'    => 'boolean',
    ];

    public function template(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FormTemplate::class);
    }
}
