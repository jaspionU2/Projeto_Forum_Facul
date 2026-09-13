<div class="max-w-2xl mx-auto space-y-6" role="feed" aria-label="{{ __('forum.posts_feed') }}">
    @foreach($posts as $index => $post)
        @include('components.post-card', [
            'post' => $post,
            'postId' => $index,
            'reactionEmojis' => $reactionEmojis ?? ['👍', '❤️', '😊', '🎉', '💡'],
        ])
    @endforeach

    @if(empty($posts))
        <div class="text-center py-12 text-gray-500">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <p>{{ __('forum.no_posts_yet') }}</p>
        </div>
    @endif
</div>