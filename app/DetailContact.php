<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailContact extends Model
{
    protected $fillable = [
        'kolom', 'title', 'destination'
    ];
}