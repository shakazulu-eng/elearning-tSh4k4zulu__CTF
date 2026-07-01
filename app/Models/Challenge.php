<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'room_id',
        'title',
        'description',
        'category',
        'difficulty',
        'points',
        'flag',
        'hint',
        'attachment',
        'is_active'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
