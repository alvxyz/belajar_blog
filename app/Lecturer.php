<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'users_id', 'biography', 'education', 'research', 'expertise', 'NIP', 'NIDN'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function publication()
    {
        return $this->hasMany('App\Publication');
    }
}