<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'email',
        'skills',
        'score',
        'resume_upload_id',
    ];

    protected $casts = [
        'skills' => 'array',
    ];
}
