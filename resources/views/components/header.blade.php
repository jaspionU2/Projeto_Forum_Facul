<header class="bg-white border-b border-gray-200 sticky top-0 z-50" role="banner">
    <div class="flex items-center justify-between h-16 px-8">
        <div class="flex-1"></div>

        <div class="flex items-center gap-4">
            <!-- Search -->
            <button
                type="button"
                class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                aria-label="{{ __('forum.search') }}"
            >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <!-- Notifications -->
            <button
                type="button"
                class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors relative"
                aria-label="{{ __('forum.notifications') }}"
            >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                @if($unreadNotificationsCount > 0)
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full" aria-label="{{ $unreadNotificationsCount }} {{ __('forum.unread_notifications') }}"></span>
                @endif
            </button>

            <!-- Settings -->
            <button
                type="button"
                class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                aria-label="{{ __('forum.settings') }}"
            >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
            </button>

            <!-- User Avatar -->
            <button
                type="button"
                class="w-9 h-9 rounded-full bg-[#6366f1] flex items-center justify-center text-white font-semibold text-sm hover:bg-[#5558e3] transition-colors"
                aria-label="{{ __('forum.user_menu') }}"
                aria-haspopup="true"
                aria-expanded="false"
            >
                {{ $userAvatar ?? 'JD' }}
            </button>
        </div>
    </div>
</header>