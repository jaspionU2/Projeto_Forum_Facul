@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f5f5f7]">
    <div class="flex min-h-screen">
        <!-- Sidebar Reutilizável com as 3 Páginas -->
        <x-sidebar />

        <!-- Área Principal -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Header Topo -->
            @include('components.header', [
                'userAvatar' => $userAvatar ?? 'U',
                'unreadNotificationsCount' => $unreadNotificationsCount ?? 0,
            ])

            <!-- Área de Feed -->
            <div class="flex flex-1">
                <!-- Coluna Central -->
                <main class="flex-1 py-6 px-8 max-w-4xl mx-auto w-full" role="main">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Card Criar Post -->
                    @include('components.create-post', [
                        'userAvatar' => $userAvatar ?? 'U',
                        'communities' => $communities ?? [],
                        'emojiList' => ['😊', '👍', '❤️', '🎉', '💡', '🚀', '👏', '💪'],
                    ])

                    <div class="mt-6">
                        <!-- Lista de Posts -->
                        @include('components.posts-list', [
                            'posts' => $posts,
                            'reactionEmojis' => ['👍', '❤️', '😊', '🎉', '💡'],
                        ])
                    </div>
                </main>

                <!-- Sidebar Direita -->
                @include('components.right-sidebar', [
                    'trendingTopics' => $trendingTopics ?? [],
                    'suggestedConnections' => $suggestedConnections ?? [],
                    'stats' => $stats ?? [],
                ])
            </div>
        </div>
    </div>
</div>
@endsection