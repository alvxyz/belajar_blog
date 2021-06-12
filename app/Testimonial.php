<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'content', 'image', 'position'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}