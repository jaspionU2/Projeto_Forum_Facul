<aside class="w-80 h-screen sticky top-0 overflow-y-auto hidden xl:block" aria-label="{{ __('forum.sidebar_right') }}">
    <div class="p-6 space-y-6">
        @include('components.trending-topics', ['trendingTopics' => $trendingTopics])
        @include('components.suggested-connections', ['suggestedConnections' => $suggestedConnections])
        @include('components.quick-stats', ['stats' => $stats])
    </div>
</aside>