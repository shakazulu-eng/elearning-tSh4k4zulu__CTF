<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'start_time',
        'end_time',
        'is_active',
        'created_by'
    ];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
