<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $table = 'competence';

    protected $fillable = [
        'period', 'content'
    ];
}