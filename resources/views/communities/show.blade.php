<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $community->name }} - Fórum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-8 px-4 flex gap-6">
        <!-- Sidebar Navigation -->
        <x-sidebar />

        <!-- Conteúdo Principal -->
        <main class="flex-1">
            <!-- Cabeçalho da Comunidade -->
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold text-[#1e3a8a] bg-blue-50 px-2.5 py-1 rounded-md">
                            Comunidade
                        </span>
                        <h1 class="text-2xl font-bold text-gray-900 mt-2">{{ $community->name }}</h1>
                        <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                            {{ $community->description ?? 'Sem descrição cadastrada.' }}
                        </p>
                    </div>
                    <a href="{{ route('communities.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-700 transition-colors">
                        &larr; Voltar para comunidades
                    </a>
                </div>
            </div>

            <!-- Feed de Posts da Comunidade -->
            <h2 class="text-lg font-bold text-gray-900 mb-4">Publicações da Comunidade</h2>

            @if($posts->isEmpty())
                <div class="bg-white p-8 rounded-xl border border-gray-200 text-center">
                    <p class="text-sm text-gray-500">Ainda não há nenhuma publicação nesta comunidade.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            @endif
        </main>
    </div>
</body>
</html>