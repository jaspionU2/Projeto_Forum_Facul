<article class="bg-white rounded-xl shadow-sm border border-gray-200 p-6" aria-labelledby="post-author-{{ $postId }}">
    <!-- Post Header -->
    <div class="flex items-start justify-between mb-4">
        <div class="flex items-start gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                <span class="text-white font-semibold">{{ $post['author']['avatar'] }}</span>
            </div>
            <div>
                <h3 id="post-author-{{ $postId }}" class="font-semibold text-gray-900">{{ $post['author']['name'] }}</h3>
                <p class="text-sm text-gray-500">{{ $post['author']['role'] }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ $post['timestamp'] }}</p>
            </div>
        </div>

        <button
            type="button"
            class="text-gray-400 hover:text-gray-600 transition-colors"
            aria-label="{{ __('forum.post_options') }}"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </button>
    </div>

    <!-- Post Content -->
    <p class="text-gray-700 leading-relaxed mb-4">{{ $post['content'] }}</p>

    <!-- Engagement Stats -->
    <div class="flex items-center justify-between py-3 border-t border-b border-gray-100 mb-3" aria-label="{{ __('forum.engagement_stats') }}">
        <div class="flex items-center gap-1">
            <div class="flex -space-x-1" aria-label="{{ __('forum.reactions') }}">
                @foreach(array_slice($reactionEmojis, 0, 3) as $emoji)
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white border-2 border-white text-sm">{{ $emoji }}</span>
                @endforeach
            </div>
            <span class="text-sm text-gray-600 ml-2">{{ $post['likes'] }} {{ __('forum.reactions_count') }}</span>
        </div>

        <div class="flex items-center gap-4 text-sm text-gray-600">
            <span>{{ $post['comments'] }} {{ __('forum.comments_count') }}</span>
            <span>{{ $post['shares'] }} {{ __('forum.shares_count') }}</span>
        </div>
    </div>

    <!-- Interaction Bar -->
    <div class="flex items-center gap-2" role="group" aria-label="{{ __('forum.post_actions') }}">
        <!-- Like + Reaction Bubble -->
        <div class="relative flex-1">
            <button
                type="button"
                wire:click="toggleLike({{ $postId }})"
                wire:loading.attr="disabled"
                class="flex items-center justify-center gap-2 px-4 py-2 rounded-lg transition-colors w-full
                    {{ $post['liked'] ? 'text-red-500 bg-red-50' : 'text-gray-600 hover:bg-gray-50' }}"
                aria-pressed="{{ $post['liked'] ? 'true' : 'false' }}"
                aria-label="{{ $post['liked'] ? __('forum.unlike') : __('forum.like') }}"
            >
                <svg class="w-5 h-5 {{ $post['liked'] ? 'fill-red-500' : '' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <span class="font-medium text-sm">{{ __('forum.like') }}</span>
            </button>

            <!-- Floating Reaction Bubble -->
            @if($post['showReactions'])
                <div
                    class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-white shadow-lg rounded-full px-3 py-2 border border-gray-200 flex gap-1 z-10"
                    role="tooltip"
                    aria-label="{{ __('forum.reactions') }}"
                >
                    @foreach($reactionEmojis as $index => $emoji)
                        <button
                            type="button"
                            wire:click="setReaction({{ $postId }}, '{{ $emoji }}')"
                            class="text-2xl hover:scale-125 transition-transform"
                            aria-label="{{ $emoji }}"
                        >{{ $emoji }}</button>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Comment -->
        <button
            type="button"
            wire:click="openComments({{ $postId }})"
            class="flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors flex-1"
            aria-label="{{ __('forum.comment') }}"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <span class="font-medium text-sm">{{ __('forum.comment') }}</span>
        </button>

        <!-- Share -->
        <button
            type="button"
            wire:click="sharePost({{ $postId }})"
            class="flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors flex-1"
            aria-label="{{ __('forum.share') }}"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="18" cy="5" r="3"></circle>
                <circle cx="6" cy="12" r="3"></circle>
                <circle cx="18" cy="19" r="3"></circle>
                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
            </svg>
            <span class="font-medium text-sm">{{ __('forum.share') }}</span>
        </button>
    </div>
</article>