@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f5f5f7]">
    <div class="flex">
        <!-- Left Sidebar -->
        @include('components.sidebar', [
            'navigationItems' => $navigationItems,
            'activeNav' => $activeNav,
        ])

        <!-- Main Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Header -->
            @include('components.header', [
                'userAvatar' => $userAvatar ?? 'JD',
                'unreadNotificationsCount' => $unreadNotificationsCount ?? 0,
            ])

            <!-- Feed Area -->
            <div class="flex flex-1">
                <!-- Main Feed -->
                <main class="flex-1 py-6 px-8" role="main">
                    <!-- Create Post Card -->
                    @include('components.create-post', [
                        'userAvatar' => $userAvatar ?? 'JD',
                        'emojiList' => $emojiList ?? ['😊', '👍', '❤️', '🎉', '💡', '🚀', '👏', '💪'],
                    ])

                    <!-- Posts List -->
                    @include('components.posts-list', [
                        'posts' => $posts ?? [],
                        'reactionEmojis' => $reactionEmojis ?? ['👍', '❤️', '😊', '🎉', '💡'],
                    ])
                </main>

                <!-- Right Sidebar -->
                @include('components.right-sidebar', [
                    'trendingTopics' => $trendingTopics ?? [],
                    'suggestedConnections' => $suggestedConnections ?? [],
                    'stats' => $stats ?? [
                        'profile_views' => 0,
                        'post_impressions' => 0,
                        'connections' => 0,
                    ],
                ])
            </div>
        </div>
    </div>
</div>
@endsection