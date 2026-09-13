<div class="max-w-2xl mx-auto space-y-6" role="feed">
    @forelse($posts as $post)
        @include('components.post-card', [
            'post' => $post,
            'postId' => $post->id,
            'reactionEmojis' => $reactionEmojis ?? ['👍', '❤️', '😊', '🎉', '💡'],
        ])
    @empty
        <div class="text-center py-12 text-gray-500">
            <p>Nenhuma publicação encontrada para o seu campus ainda.</p>
        </div>
    @endforelse
</div>