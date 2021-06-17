<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraduateProfile extends Model
{
    protected $fillable = [
        'period', 'content'
    ];
}