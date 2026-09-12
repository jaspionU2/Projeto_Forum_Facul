<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'name',
        'institution_id',
        'address_id'
    ];

    // N:1
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // 1:N
    public function communities()
    {
        return $this->hasMany(Community::class);
    }

    // 1:N
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    // 1:1
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
