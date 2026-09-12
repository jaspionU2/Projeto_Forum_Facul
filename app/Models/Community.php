<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
        'name',
        'description',
        'campus_id'
    ];

    // N:1
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    // 1:N
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    
}
