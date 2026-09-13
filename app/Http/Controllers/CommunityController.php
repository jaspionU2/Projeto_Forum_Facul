<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    // Exibe apenas as comunidades do Campus do usuário (RN01)
    public function index(Request $request)
    {
        $user = Auth::user();

        $communities = Community::where('campus_id', $user->campus_id)
            ->withCount('posts')
            ->get();

        // Se a requisição esperar JSON (API/AJAX), retorna JSON, senão carrega a View Blade
        if ($request->wantsJson()) {
            return response()->json($communities);
        }

        return view('communities.index', compact('communities'));
    }

    // Exibe os posts de uma comunidade específica
    public function show(Community $community)
    {
        $posts = Post::with(['user', 'community', 'comments'])
            ->where('community_id', $community->id)
            ->orderByDesc('created_at')
            ->get();

        return view('communities.show', compact('community', 'posts'));
    }

    // Salva uma nova comunidade
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'campus_id'   => 'required|exists:campuses,id',
        ]);

        $community = Community::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'message'   => 'Comunidade criada com sucesso',
                'community' => $community
            ], 201);
        }

        return redirect()->route('communities.index')->with('success', 'Comunidade criada com sucesso!');
    }
}