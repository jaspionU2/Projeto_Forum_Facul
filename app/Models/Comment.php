<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'post_id',
        'user_id',
        'parent_id',
        'likes_count'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Auto-relacionamento:
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Auto-relacionamento
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // N:N
    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_likes');
    }
}
