<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'lecturer_id',
    ];

    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer', 'lecturer_id');
    }
}