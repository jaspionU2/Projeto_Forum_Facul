<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5" aria-labelledby="trending-heading">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-[#1e3a8a]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
            <polyline points="17 6 23 6 23 12"></polyline>
        </svg>
        <h3 id="trending-heading" class="font-semibold text-gray-900">{{ __('forum.trending_topics') }}</h3>
    </div>

    <div class="space-y-3">
        @foreach($trendingTopics as $topic)
            <button
                type="button"
                wire:click="filterByTopic('{{ $topic['tag'] }}')"
                class="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors"
            >
                <div class="font-medium text-[#1e3a8a] text-sm">{{ $topic['tag'] }}</div>
                <div class="text-xs text-gray-500 mt-1">{{ $topic['posts'] }} {{ __('forum.posts_count') }}</div>
            </button>
        @endforeach
    </div>
</div>