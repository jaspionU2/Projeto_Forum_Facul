<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'cep'
    ];


    public function campus()
    {
        return $this->hasOne(Campus::class);
    }
}
