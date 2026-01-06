<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'room_name',
        'creator_id',
        'is_private',
        'starts_at'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
