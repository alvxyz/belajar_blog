<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use Sluggable;

    protected $table = 'agenda';

    protected $fillable = [
        'title', 'place', 'date', 'content', 'image', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}