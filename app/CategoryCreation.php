<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCreation extends Model
{
    protected $table = 'category_creation';

    protected $fillable = [
        'name'
    ];

    public function creations()
    {
        return $this->hasMany('App\Creation');
    }
}