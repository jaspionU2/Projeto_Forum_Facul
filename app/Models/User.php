<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    //SQL INJECTION
    protected $fillable = [
        'name',
        'email',
        'password',
        'campus_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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

    // 1:N
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // N:N
    public function roles()
    {
        return $this->belongsToMany(Role::class)
                    ->withPivot(['campus_id', 'community_id']);
    }
}
