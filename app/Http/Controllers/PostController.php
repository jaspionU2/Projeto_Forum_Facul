<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Exibe o Feed principal
    public function index()
    {
        $user = Auth::user();

        // Busca os posts apenas das comunidades do campus do usuário logado (RN01)
        // E ordena pela quantidade de curtidas (RF04 - Relevância)
        $posts = Post::with(['user', 'community', 'comments'])
            ->whereHas('community', function ($query) use ($user) {
                $query->where('campus_id', $user->campus_id);
            })
            ->orderByDesc('likes_count')
            ->orderByDesc('created_at') // Desempate por data
            ->get()
            ->map(function ($post) {
                $post->image_base64 = $post->image_binary
                    ? 'data:image/png;base64,' . base64_encode($post->image_binary)
                    : null;

                return $post;
            });

     
        return view('forum.feed', compact('posts'));
    }   

    // Salva um novo post no banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'community_id' => 'required|exists:communities,id',
            'image' => 'nullable|string',
        ]);

        $imageBinary = null;

        if ($request->filled('image')) {
            $base64Image = preg_replace('/^data:image\\/[a-zA-Z]+;base64,/', '', $request->input('image'));
            $decodedImage = base64_decode($base64Image, true);

            if ($decodedImage === false) {
                return back()->withErrors([
                    'image' => 'A imagem enviada não é um base64 válido.',
                ])->withInput();
            }

            $imageBinary = $decodedImage;
        }

        // Cria o post vinculando ao usuário logado
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'community_id' => $validated['community_id'],
            'user_id' => Auth::id(),
            'image_binary' => $imageBinary
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicação criada!');
    }

    // Deleta um post (Soft Delete)
    public function destroy(Post $post)
    {
        // O Laravel permite checar se o usuário é o dono do post antes de apagar
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post excluído.');
    }
}
