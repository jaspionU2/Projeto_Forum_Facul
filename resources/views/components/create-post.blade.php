<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6" role="region" aria-label="{{ __('forum.create_post') }}">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="flex items-start gap-4">
            <!-- User Avatar -->
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                <span class="text-white font-semibold">{{ $userAvatar ?? 'JD' }}</span>
            </div>

            <div class="flex-1 space-y-3">
                <!-- Title Field -->
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Título do seu post..." 
                    required
                    value="{{ old('title') }}"
                    class="w-full p-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent text-gray-800 font-medium placeholder-gray-400 text-sm"
                >

                <!-- Content Area -->
                <textarea
                    name="content"
                    required
                    placeholder="{{ __('forum.share_thoughts') }}"
                    class="w-full min-h-[100px] p-3 border border-gray-200 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent text-gray-700 placeholder-gray-400 text-sm"
                    aria-label="{{ __('forum.post_content') }}"
                >{{ old('content') }}</textarea>

                <!-- Emoji Row -->
                <div class="mt-3 flex items-center gap-2 pb-3 border-b border-gray-100" aria-label="{{ __('forum.emojis') }}">
                    @foreach($emojiList ?? ['😊', '👍', '❤️', '🎉', '💡', '🚀'] as $emoji)
                        <button
                            type="button"
                            onclick="const textarea = this.closest('form').querySelector('textarea'); textarea.value += '{{ $emoji }}'; textarea.focus();"
                            class="text-2xl hover:scale-110 transition-transform"
                            aria-label="{{ $emoji }}"
                        >{{ $emoji }}</button>
                    @endforeach
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Community Selection -->
                        <div class="flex items-center gap-2">
                            <label for="community_id" class="text-xs font-medium text-gray-500">Comunidade:</label>
                            <select 
                                name="community_id" 
                                id="community_id" 
                                required
                                class="text-xs bg-gray-50 border border-gray-200 text-gray-700 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#1e3a8a]"
                            >
                                <option value="1">Geral do Campus</option>
                            </select>
                        </div>

                        <!-- Attach Image -->
                        <button
                            type="button"
                            class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                            aria-label="{{ __('forum.attach_image') }}"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span class="text-sm font-medium">{{ __('forum.attach_image') }}</span>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="px-6 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-[#1e40af] transition-colors font-medium text-sm shadow-sm"
                    >
                        {{ __('forum.post') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>