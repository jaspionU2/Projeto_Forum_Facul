<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'community_id',
        'likes_count',
        'comments_count',
        'image_binary'
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

    protected function imageBase64(): Attribute
{
    return Attribute::make(
        get: function ($value, array $attributes) {
            $raw = $attributes['image_binary'] ?? null;

            if (!$raw) {
                return null;
            }

            // 1. Se for um resource (stream PDO pgsql), reseta o ponteiro e lê os dados
            if (is_resource($raw)) {
                rewind($raw);
                $raw = stream_get_contents($raw);
            }

            if (empty($raw)) {
                return null;
            }

            // 2. Se o PostgreSQL retornar no formato Hexadecimal (\x...), converte para binário puro
            if (is_string($raw) && str_starts_with($raw, '\x')) {
                $raw = hex2bin(substr($raw, 2));
            }

            // 3. Detecta o MIME type real do arquivo binário
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_buffer($finfo, $raw) ?: 'image/png';
            finfo_close($finfo);

            // 4. Retorna a Data URL pronta para a tag <img>
            return 'data:' . $mimeType . ';base64,' . base64_encode($raw);
        }
    );
}
}

