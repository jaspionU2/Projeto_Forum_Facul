<article class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-4">
    <!-- Post Header -->
    <div class="flex items-start justify-between mb-4">
        <div class="flex items-start gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                <span class="text-white font-semibold">
                    {{ strtoupper(substr($post->user->name ?? 'U', 0, 2)) }}
                </span>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900">{{ $post->user->name ?? 'Usuário' }}</h3>
                <p class="text-xs text-gray-400 mt-0.5">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        @if($post->user_id === auth()->id())
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors text-xs font-medium" title="Excluir post">
                    Excluir
                </button>
            </form>
        @endif
    </div>

    <!-- Conteúdo em Texto -->
    @if($post->title)
        <h4 class="font-bold text-gray-900 mb-1">{{ $post->title }}</h4>
    @endif
    <p class="text-gray-700 leading-relaxed mb-4 text-sm">{{ $post->content }}</p>

    <!-- Exibição da Imagem em Base64 se existir no Post -->
    @if(!empty($post->image_base64))
        <div class="mb-4 rounded-lg overflow-hidden border border-gray-100 max-h-96 flex items-center justify-center bg-gray-50">
            <img src="{{ $post->image_base64 }}" alt="Imagem da publicação" class="w-full h-auto object-cover max-h-96">
        </div>
    @endif

    <!-- Estatísticas -->
    <div class="flex items-center justify-between py-2.5 border-t border-b border-gray-100 text-xs text-gray-500 mb-3">
        <span>❤️ {{ $post->likes_count ?? 0 }} curtidas</span>
        <span>💬 {{ $post->comments->count() }} comentários</span>
    </div>

    <!-- Barra de Interações -->
    <div class="flex items-center gap-2 border-b border-gray-100 pb-3 mb-4">
        <!-- Botão de Like -->
        <form method="POST" action="{{ route('posts.like', $post->id) }}" class="flex-1">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-1.5 rounded-lg text-gray-600 hover:bg-gray-50 text-sm font-medium transition-colors">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                Curtir
            </button>
        </form>

        <!-- Botão Toggle Comentários -->
        <button 
            type="button" 
            onclick="document.getElementById('comments-{{ $post->id }}').classList.toggle('hidden')"
            class="flex-1 flex items-center justify-center gap-2 px-3 py-1.5 rounded-lg text-gray-600 hover:bg-gray-50 text-sm font-medium transition-colors"
        >
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            Comentar
        </button>
    </div>

    <!-- Seção de Comentários -->
    <div id="comments-{{ $post->id }}" class="hidden space-y-3 pt-1">
        <!-- Formulário de Novo Comentário -->
        <form method="POST" action="{{ route('comments.store') }}" class="flex gap-2">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            
            <input 
                type="text" 
                name="content" 
                placeholder="Escreva um comentário..." 
                required 
                class="flex-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] focus:bg-white transition-all"
            >
            <button type="submit" class="px-4 py-2 bg-[#1e3a8a] text-white rounded-lg text-xs font-semibold hover:bg-[#1e40af] transition-colors shadow-sm">
                Enviar
            </button>
        </form>

        <!-- Lista de Comentários Salvos -->
        @if($post->comments && $post->comments->count() > 0)
            <div class="space-y-2 max-h-60 overflow-y-auto pt-2">
                @foreach($post->comments as $comment)
                    <div class="bg-gray-50 p-3 rounded-lg text-xs flex items-start justify-between gap-2 border border-gray-100">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-900">{{ $comment->user->name ?? 'Usuário' }}</span>
                                <span class="text-[10px] text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $comment->content }}</p>
                        </div>

                        @if($comment->user_id === auth()->id())
                            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors font-bold px-1" title="Excluir comentário">
                                    &times;
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</article>