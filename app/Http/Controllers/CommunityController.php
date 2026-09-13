<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    // Exibe apenas as comunidades do Campus do usuário (RN01)
    public function index()
    {
        $user = Auth::user();

        $communities = Community::where('campus_id', $user->campus_id)
            ->withCount('posts') // Traz a contagem de posts da comunidade
            ->get();

        return response()->json($communities);
    }

    // Salva uma nova comunidade
    public function store(Request $request)
    {
        // A validação de quem pode criar (RF01 - Admin Global) será feita via Policy futuramente.
        // Por enquanto, validamos apenas os dados.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'campus_id' => 'required|exists:campuses,id'
        ]);

        $community = Community::create($validated);

        return response()->json([
            'message' => 'Comunidade criada com sucesso',
            'community' => $community
        ], 201);
    }
}