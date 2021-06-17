<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisionAndMission extends Model
{

    protected $table = 'vision_and_mission';

    protected $fillable = [
        'period', 'vision', 'mission'
    ];
}