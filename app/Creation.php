<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'creator', 'position', 'content', 'image', 'video', 'category_creation_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category_creation()
    {
        return $this->belongsTo('App\CategoryCreation', 'category_creation_id');
    }
}