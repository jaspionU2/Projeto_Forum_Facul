<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidades - Fórum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-8 px-4 flex gap-6">
        <!-- Sidebar Navigation -->
        <aside class="w-64 flex-shrink-0 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-bold text-[#1e3a8a] mb-6">Fórum</h2>
            <nav class="space-y-1">
                <a href="{{ route('posts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Feed Principal</span>
                </a>
                <a href="{{ route('communities.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium bg-[#1e3a8a] text-white shadow-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span>Comunidades</span>
                </a>
                <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Configurações</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Todas as Comunidades</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($communities as $community)
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-1">{{ $community->name }}</h3>
                            <p class="text-xs text-gray-500 mb-4">{{ $community->description ?? 'Sem descrição cadastrada.' }}</p>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                            <span class="text-xs text-gray-400">{{ $community->posts_count }} postagens</span>
                            <a href="{{ route('communities.show', $community->id) }}" class="px-3 py-1.5 bg-[#1e3a8a] text-white text-xs font-semibold rounded-lg hover:bg-[#1e40af] transition-colors">
                                Acessar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>