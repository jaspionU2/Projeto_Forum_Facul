<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5" aria-labelledby="stats-heading">
    <h3 id="stats-heading" class="font-semibold text-gray-900 mb-4">{{ __('forum.your_activity') }}</h3>

    <div class="space-y-3">
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">{{ __('forum.profile_views') }}</span>
            <span class="font-semibold text-gray-900">{{ $stats['profile_views'] }}</span>
        </div>

        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">{{ __('forum.post_impressions') }}</span>
            <span class="font-semibold text-gray-900">{{ $stats['post_impressions'] }}</span>
        </div>

        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">{{ __('forum.connections') }}</span>
            <span class="font-semibold text-gray-900">{{ $stats['connections'] }}</span>
        </div>
    </div>
</div>