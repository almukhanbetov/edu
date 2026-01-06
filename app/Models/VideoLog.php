<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoLog extends Model
{
     protected $fillable = [
        'video_room_id',
        'user_id',
        'joined_at',
    ];

    public $timestamps = false; // если в таблице нет created_at / updated_at
}
