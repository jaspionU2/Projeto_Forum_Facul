<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6" role="region" aria-label="{{ __('forum.create_post') }}">
    <div class="flex items-start gap-4">
        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
            <span class="text-white font-semibold">{{ $userAvatar ?? 'JD' }}</span>
        </div>

        <div class="flex-1">
            <textarea
                wire:model.debounce.300ms="postText"
                placeholder="{{ __('forum.share_thoughts') }}"
                class="w-full min-h-[100px] p-3 border border-gray-200 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent text-gray-700 placeholder-gray-400"
                aria-label="{{ __('forum.post_content') }}"
            ></textarea>

            <!-- Emoji Row -->
            <div class="mt-3 flex items-center gap-2 pb-3 border-b border-gray-100" aria-label="{{ __('forum.emojis') }}">
                @foreach($emojiList as $emoji)
                    <button
                        type="button"
                        wire:click="addEmoji('{{ $emoji }}')"
                        class="text-2xl hover:scale-110 transition-transform"
                        aria-label="{{ $emoji }}"
                    >{{ $emoji }}</button>
                @endforeach
            </div>

            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <!-- Attach Image -->
                    <button
                        type="button"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                        aria-label="{{ __('forum.attach_image') }}"
                    >
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span class="text-sm font-medium">{{ __('forum.attach_image') }}</span>
                    </button>

                    <!-- Attach Video -->
                    <button
                        type="button"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                        aria-label="{{ __('forum.attach_video') }}"
                    >
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polygon points="23 7 16 12 23 17 23 7"></polygon>
                            <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                        </svg>
                        <span class="text-sm font-medium">{{ __('forum.attach_video') }}</span>
                    </button>
                </div>

                <button
                    type="button"
                    wire:click="createPost"
                    wire:loading.attr="disabled"
                    class="px-6 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-[#1e40af] transition-colors font-medium text-sm"
                >
                    {{ __('forum.post') }}
                </button>
            </div>
        </div>
    </div>
</div>