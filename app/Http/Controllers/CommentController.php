<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Salva um novo comentário em um post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'parent_id' => $validated['parent_id'] ?? null,
            'user_id' => Auth::id(),
        ]);

        // Retorna para o feed atualizando a página
        return back()->with('success', 'Comentário adicionado!');
    }

    // Deleta o comentário (Soft Delete)
    public function destroy(Comment $comment)
    {
        // Garante que apenas o autor original apague o próprio comentário
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $comment->delete();

        return back()->with('success', 'Comentário excluído com sucesso!');
    }
}