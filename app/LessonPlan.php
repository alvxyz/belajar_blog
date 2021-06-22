<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class LessonPlan extends Model
{
    use Sluggable;

    protected $table = 'lessonplans';

    protected $fillable = [
        'curriculum', 'file'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'curriculum'
            ]
        ];
    }
}