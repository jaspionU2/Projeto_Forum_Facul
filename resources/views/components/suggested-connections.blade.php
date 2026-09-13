<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5" aria-labelledby="connections-heading">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-5 h-5 text-[#1e3a8a]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <h3 id="connections-heading" class="font-semibold text-gray-900">{{ __('forum.suggested_connections') }}</h3>
    </div>

    <div class="space-y-4">
        @foreach($suggestedConnections as $person)
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                    <span class="text-white text-sm font-semibold">{{ $person['initials'] }}</span>
                </div>

                <div class="flex-1 min-w-0">
                    <h4 class="font-medium text-gray-900 text-sm truncate">{{ $person['name'] }}</h4>
                    <p class="text-xs text-gray-500 truncate">{{ $person['role'] }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $person['mutual'] }} {{ __('forum.mutual_connections') }}</p>
                    <button
                        type="button"
                        wire:click="connect('{{ $person['name'] }}')"
                        class="mt-2 text-xs font-medium text-[#1e3a8a] hover:text-[#1e40af]"
                    >{{ __('forum.connect') }}</button>
                </div>
            </div>
        @endforeach
    </div>
</div>