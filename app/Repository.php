<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{

    use Sluggable;

    // protected $table = 'repository';

    protected $fillable = [
        'title', 'file', 'content'
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