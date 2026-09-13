<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'community_id',
        'likes_count',
        'comments_count'
    ];

    // N:1 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // N:1
    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    // 1:N
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // N:N
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_likes');
    }
}
