<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Busca todas as postagens com eager-loading dos dados do Autor e Comunidade
        $posts = Post::with(['user', 'community', 'comments'])
            ->orderByDesc('created_at')
            ->get();

        // Variáveis visuais da Sidebar e Header
        $userAvatar = strtoupper(substr($user->name ?? 'U', 0, 2));
        $unreadNotificationsCount = 3;

        $navigationItems = [
            ['label' => 'Feed Principal', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>'],
            ['label' => 'Comunidades', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'],
        ];

        $activeNav = 'Feed Principal';

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
            'userAvatar',
            'navigationItems',
            'activeNav',
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