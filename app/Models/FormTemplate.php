<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class FormTemplate extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image_url',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];
}
