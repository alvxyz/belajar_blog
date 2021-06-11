<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'sub_title', 'content', 'image'
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