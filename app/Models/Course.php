<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Fields allowed when creating or updating a course
    protected $fillable = [
        'name',
        'description',
        'duration',
        'fee',
        'difficulty',
        'is_active',
    ];
}
