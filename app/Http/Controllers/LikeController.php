<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function togglePostLike(Post $post)
    {
        $user = Auth::user();

        // Verifica se o usuário já curtiu o post através do relacionamento
        $hasLiked = $post->likes()->where('user_id', $user->id)->exists();

        if ($hasLiked) {
            // Se já curtiu, remove o like (Descurtir) e diminui o contador
            $post->likes()->detach($user->id);
            $post->decrement('likes_count');
            $message = 'Post descurtido';
        } else {
            // Se não curtiu, adiciona o like e aumenta o contador
            $post->likes()->attach($user->id);
            $post->increment('likes_count');
            $message = 'Post curtido';
        }

        // Retorna apenas os dados para o Vue.js atualizar a tela sem recarregar
        return back();
    }
}
