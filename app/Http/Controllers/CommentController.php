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
            // O parent_id permite que um comentário seja resposta de outro comentário
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'parent_id' => $validated['parent_id'] ?? null,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Comentário adicionado',
            'comment' => $comment
        ], 201);
    }

    // Deleta o comentário (Soft Delete)
    public function destroy(Comment $comment)
    {
        // Garante que apenas o autor original apague o próprio comentário
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Ação não autorizada.'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comentário excluído com sucesso']);
    }
}
