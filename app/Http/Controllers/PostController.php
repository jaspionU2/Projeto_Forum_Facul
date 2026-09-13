<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $posts = Post::with(['user', 'community', 'comments'])
        ->orderByDesc('created_at')
        ->get();

    // Traz as comunidades do campus do usuário
    $communities = \App\Models\Community::where('campus_id', $user->campus_id)->get();

    $userAvatar = strtoupper(substr($user->name ?? 'U', 0, 2));
    $unreadNotificationsCount = 3;

    $trendingTopics = [
        ['tag' => '#DesenvolvimentoWeb', 'posts' => 15],
        ['tag' => '#ProvasEngenharia', 'posts' => 9],
    ];

    $suggestedConnections = [
        ['name' => 'Carla Souza', 'role' => 'Estudante de Análise de Sistemas', 'mutual' => 3, 'initials' => 'CS'],
    ];

    $stats = [
        'profile_views' => 42,
        'post_impressions' => 120,
        'connections' => 18,
    ];

    return view('forum.feed', compact(
        'posts',
        'communities',
        'userAvatar',
        'unreadNotificationsCount',
        'trendingTopics',
        'suggestedConnections',
        'stats'
    ));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'community_id' => 'required|exists:communities,id',
        'image' => 'nullable|string',
    ]);

    $imageBinary = null;

    if ($request->filled('image')) {
        $base64Image = preg_replace('/^data:image\/[a-zA-Z]+;base64,/', '', $request->input('image'));
        $decodedImage = base64_decode($base64Image, true);

        if ($decodedImage === false) {
            return back()->withErrors([
                'image' => 'A imagem enviada não é um base64 válido.',
            ])->withInput();
        }

        // CORREÇÃO AQUI: 
        // Em vez de stream, convertemos o binário bruto para uma string Hexadecimal.
        // O PostgreSQL entende que qualquer string começando com '\x' em uma coluna BYTEA é um binário.
        $imageBinary = '\x' . bin2hex($decodedImage);
    }

    // Criação da publicação unificada
    Post::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'community_id' => $validated['community_id'],
        'user_id' => Auth::id(),
        'image_binary' => $imageBinary,
        'likes_count' => 0,
    ]);

    return redirect()->route('posts.index')->with('success', 'Publicação criada com sucesso!');
}

    public function destroy(Post $post)
    {
        // Garante que apenas o autor original apague o próprio post
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $post->delete();

        return back()->with('success', 'Publicação excluída com sucesso!');
    }
}