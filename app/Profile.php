<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'users_id', 'avatar', 'about'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
