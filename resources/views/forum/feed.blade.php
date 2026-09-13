@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f5f5f7]">
    <div class="flex">
        <!-- Left Sidebar (Navegação Esquerda) -->
        @include('components.sidebar', [
            'navigationItems' => $navigationItems,
            'activeNav' => $activeNav,
        ])

        <!-- Main Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Header (Topo) -->
            @include('components.header', [
                'userAvatar' => $userAvatar ?? 'JD',
                'unreadNotificationsCount' => $unreadNotificationsCount ?? 0,
            ])

            <!-- Feed Area -->
            <div class="flex flex-1">
                <!-- Main Feed (Coluna Central) -->
                <main class="flex-1 py-6 px-8" role="main">
                    <!-- Componente: Criar Post -->
                    @include('components.create-post', [
                        'userAvatar' => $userAvatar ?? 'JD',
                        'emojiList' => ['😊', '👍', '❤️', '🎉', '💡', '🚀', '👏', '💪'],
                    ])

                    <div class="mt-6">
                        <!-- Componente: Lista de Posts -->
                        @include('components.posts-list', [
                            'posts' => $posts,
                            'reactionEmojis' => ['👍', '❤️', '😊', '🎉', '💡'],
                        ])
                    </div>
                </main>

                <!-- Right Sidebar (Barra Lateral Direita) -->
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