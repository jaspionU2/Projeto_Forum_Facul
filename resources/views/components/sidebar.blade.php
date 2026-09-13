<aside class="w-64 bg-white border-r border-gray-200 h-screen sticky top-0 hidden lg:block">
    <div class="p-6">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-lg bg-[#1e3a8a] flex items-center justify-center">
                <span class="text-white font-semibold text-lg">CN</span>
            </div>
            <span class="font-semibold text-gray-900 text-lg">{{ config('app.name', 'CoopNet') }}</span>
        </div>

        <!-- Navigation -->
        <nav class="space-y-1" aria-label="Main navigation">
            @foreach($navigationItems as $item)
                <button
                    type="button"
                    wire:click="setActiveNav('{{ $item['label'] }}')"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
                        {{ $activeNav === $item['label'] ? 'bg-[#1e3a8a] text-white' : 'text-gray-700 hover:bg-gray-50' }}"
                    aria-current="{{ $activeNav === $item['label'] ? 'page' : 'false' }}"
                >
                    <span class="w-5 h-5 flex-shrink-0" wire:ignore>
                        {!! $item['icon'] !!}
                    </span>
                    <span class="font-medium text-sm">{{ $item['label'] }}</span>
                </button>
            @endforeach
        </nav>

        <!-- Settings Link -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <button
                type="button"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                wire:navigate
                href="{{ route('settings') }}"
            >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
                <span class="font-medium text-sm">{{ __('forum.settings') }}</span>
            </button>
        </div>
    </div>
</aside>