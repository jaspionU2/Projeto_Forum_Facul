<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'cnpj'];

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }
}
