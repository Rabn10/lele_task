<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeUpload extends Model
{
    protected $fillable = [
       'file_name',
       'status'
    ];
}
