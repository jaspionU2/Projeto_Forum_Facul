<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>コープネット</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <style>[v-cloak] { display: none; }</style>
</head>
<body class="bg-[#f5f5f7]">

<div id="app" v-cloak>
  <div class="min-h-screen bg-[#f5f5f7]">
    <div class="flex">

      <!-- ===== LEFT SIDEBAR ===== -->
      <aside class="w-64 bg-white border-r border-gray-200 h-screen sticky top-0">
        <div class="p-6">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-lg bg-[#1e3a8a] flex items-center justify-center">
              <span class="text-white font-semibold text-lg">CN</span>
            </div>
            <span class="font-semibold text-gray-900 text-lg">コープネット</span>
          </div>

          <nav class="space-y-1">
            <button
              v-for="item in navigationItems"
              :key="item.label"
              @click="activeNav = item.label"
              :class="['w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-colors',
                activeNav === item.label ? 'bg-[#1e3a8a] text-white' : 'text-gray-700 hover:bg-gray-50']"
            >
              <span class="w-5 h-5 flex-shrink-0" v-html="item.icon"></span>
              <span class="font-medium text-sm">{{ item.label }}</span>
            </button>
          </nav>

          <div class="mt-8 pt-8 border-t border-gray-200">
            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
              </svg>
              <span class="font-medium text-sm">設定</span>
            </button>
          </div>
        </div>
      </aside>

      <!-- ===== MAIN AREA ===== -->
      <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
          <div class="flex items-center justify-between h-16 px-8">
            <div class="flex-1"></div>
            <div class="flex items-center gap-4">
              <!-- Search -->
              <button class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>
              <!-- Notifications -->
              <button class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors relative">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                  <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
              </button>
              <!-- Settings -->
              <button class="p-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="3"></circle>
                  <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
              </button>
              <!-- User Avatar -->
              <button class="w-9 h-9 rounded-full bg-[#6366f1] flex items-center justify-center text-white font-semibold text-sm hover:bg-[#5558e3] transition-colors">
                JD
              </button>
            </div>
          </div>
        </header>

        <div class="flex flex-1">

          <!-- FEED -->
          <main class="flex-1 py-6 px-8">
            <div class="max-w-2xl mx-auto space-y-6">

              <!-- CREATE POST CARD -->
              <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-semibold">JD</span>
                  </div>
                  <div class="flex-1">
                    <textarea
                      v-model="postText"
                      placeholder="チームと考えをシェアしましょう..."
                      class="w-full min-h-[100px] p-3 border border-gray-200 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent text-gray-700 placeholder-gray-400"
                    ></textarea>

                    <!-- Emoji Row -->
                    <div class="mt-3 flex items-center gap-2 pb-3 border-b border-gray-100">
                      <button
                        v-for="emoji in emojiList"
                        :key="emoji"
                        @click="postText += emoji"
                        class="text-2xl hover:scale-110 transition-transform"
                      >{{ emoji }}</button>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                      <div class="flex items-center gap-2">
                        <!-- Attach Image -->
                        <button class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                          </svg>
                          <span class="text-sm font-medium">画像を添付</span>
                        </button>
                        <!-- Attach Video -->
                        <button class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="23 7 16 12 23 17 23 7"></polygon>
                            <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                          </svg>
                          <span class="text-sm font-medium">動画を添付</span>
                        </button>
                      </div>
                      <button class="px-6 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-[#1e40af] transition-colors font-medium text-sm">
                        投稿
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- POST CARDS -->
              <article
                v-for="(post, index) in posts"
                :key="index"
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6"
              >
                <!-- Post Header -->
                <div class="flex items-start justify-between mb-4">
                  <div class="flex items-start gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-semibold">{{ post.author.avatar }}</span>
                    </div>
                    <div>
                      <h3 class="font-semibold text-gray-900">{{ post.author.name }}</h3>
                      <p class="text-sm text-gray-500">{{ post.author.role }}</p>
                      <p class="text-xs text-gray-400 mt-1">{{ post.timestamp }}</p>
                    </div>
                  </div>
                  <button class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle>
                    </svg>
                  </button>
                </div>

                <!-- Post Content -->
                <p class="text-gray-700 leading-relaxed mb-4">{{ post.content }}</p>

                <!-- Engagement Stats -->
                <div class="flex items-center justify-between py-3 border-t border-b border-gray-100 mb-3">
                  <div class="flex items-center gap-1">
                    <div class="flex -space-x-1">
                      <span v-for="(emoji, i) in reactionEmojis.slice(0, 3)" :key="i"
                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white border-2 border-white text-sm">{{ emoji }}</span>
                    </div>
                    <span class="text-sm text-gray-600 ml-2">{{ post.likes }} 件の反応</span>
                  </div>
                  <div class="flex items-center gap-4 text-sm text-gray-600">
                    <span>{{ post.comments }} 件のコメント</span>
                    <span>{{ post.shares }} 件のシェア</span>
                  </div>
                </div>

                <!-- Interaction Bar -->
                <div class="flex items-center gap-2">
                  <!-- Like + Reaction Bubble -->
                  <div class="relative flex-1">
                    <button
                      @click="post.liked = !post.liked"
                      @mouseenter="post.showReactions = true"
                      @mouseleave="post.showReactions = false"
                      :class="['flex items-center justify-center gap-2 px-4 py-2 rounded-lg transition-colors w-full',
                        post.liked ? 'text-red-500 bg-red-50' : 'text-gray-600 hover:bg-gray-50']"
                    >
                      <svg class="w-5 h-5" :class="post.liked ? 'fill-red-500' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                      </svg>
                      <span class="font-medium text-sm">いいね</span>
                    </button>
                    <!-- Floating Reaction Bubble -->
                    <div
                      v-if="post.showReactions"
                      class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-white shadow-lg rounded-full px-3 py-2 border border-gray-200 flex gap-1 z-10"
                      @mouseenter="post.showReactions = true"
                      @mouseleave="post.showReactions = false"
                    >
                      <button
                        v-for="(emoji, i) in reactionEmojis" :key="i"
                        @click="post.liked = true; post.showReactions = false"
                        class="text-2xl hover:scale-125 transition-transform"
                      >{{ emoji }}</button>
                    </div>
                  </div>

                  <!-- Comment -->
                  <button class="flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors flex-1">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="font-medium text-sm">コメント</span>
                  </button>

                  <!-- Share -->
                  <button class="flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors flex-1">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle>
                      <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                      <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg>
                    <span class="font-medium text-sm">シェア</span>
                  </button>
                </div>
              </article>

            </div>
          </main>

          <!-- ===== RIGHT SIDEBAR ===== -->
          <aside class="w-80 h-screen sticky top-0 overflow-y-auto">
            <div class="p-6 space-y-6">

              <!-- Trending Topics -->
              <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center gap-2 mb-4">
                  <svg class="w-5 h-5 text-[#1e3a8a]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                    <polyline points="17 6 23 6 23 12"></polyline>
                  </svg>
                  <h3 class="font-semibold text-gray-900">トレンドトピック</h3>
                </div>
                <div class="space-y-3">
                  <button
                    v-for="topic in trendingTopics" :key="topic.tag"
                    class="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors"
                  >
                    <div class="font-medium text-[#1e3a8a] text-sm">{{ topic.tag }}</div>
                    <div class="text-xs text-gray-500 mt-1">{{ topic.posts }} 件の投稿</div>
                  </button>
                </div>
              </div>

              <!-- Suggested Connections -->
              <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center gap-2 mb-4">
                  <svg class="w-5 h-5 text-[#1e3a8a]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <h3 class="font-semibold text-gray-900">知り合いかもしれない人</h3>
                </div>
                <div class="space-y-4">
                  <div v-for="person in suggestedConnections" :key="person.name" class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                      <span class="text-white text-sm font-semibold">{{ person.initials }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                      <h4 class="font-medium text-gray-900 text-sm truncate">{{ person.name }}</h4>
                      <p class="text-xs text-gray-500 truncate">{{ person.role }}</p>
                      <p class="text-xs text-gray-400 mt-1">共通のつながり {{ person.mutual }} 人</p>
                      <button class="mt-2 text-xs font-medium text-[#1e3a8a] hover:text-[#1e40af]">つながる</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Quick Stats -->
              <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <h3 class="font-semibold text-gray-900 mb-4">あなたのアクティビティ</h3>
                <div class="space-y-3">
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">プロフィール閲覧数</span>
                    <span class="font-semibold text-gray-900">247</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">投稿インプレッション</span>
                    <span class="font-semibold text-gray-900">1,834</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">つながり</span>
                    <span class="font-semibold text-gray-900">342</span>
                  </div>
                </div>
              </div>

            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
const { createApp } = Vue;

createApp({
  data() {
    return {
      activeNav: 'ホーム',
      postText: '',
      emojiList: ['😊', '👍', '❤️', '🎉', '💡', '🚀', '👏', '💪'],
      reactionEmojis: ['👍', '❤️', '😊', '🎉', '💡'],
      navigationItems: [
        { label: 'ホーム', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>` },
        { label: 'ネットワーク', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>` },
        { label: '求人', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>` },
        { label: 'メッセージ', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>` },
        { label: '通知', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>` },
        { label: '分析', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>` },
        { label: '学習', icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>` },
      ],
      trendingTopics: [
        { tag: '#製品発売', posts: 234 },
        { tag: '#イノベーション', posts: 189 },
        { tag: '#チームビルディング', posts: 156 },
        { tag: '#第1四半期目標', posts: 142 },
        { tag: '#企業文化', posts: 98 },
      ],
      suggestedConnections: [
        { name: '陳 美玲', initials: '陳美', role: 'プロダクトマネージャー', mutual: 12 },
        { name: 'マイケル・ロドリゲス', initials: 'MR', role: 'エンジニアリングリード', mutual: 8 },
        { name: 'エミリー・ワトソン', initials: 'EW', role: 'デザインディレクター', mutual: 15 },
        { name: '金 大輝', initials: '金大', role: 'マーケティングマネージャー', mutual: 6 },
      ],
      posts: [
        { author: { name: 'ジェシカ・マルティネス', role: 'エンジニアリング担当副社長', avatar: 'JM' }, timestamp: '2時間前', content: '第1四半期の結果を発表できることを嬉しく思います！私たちのチームはすべての期待を上回り、優れたパフォーマンスを発揮しました。これを可能にしてくれた皆様に心から感謝します。さらに良い第2四半期に向けて！🚀', likes: 128, comments: 34, shares: 12, liked: false, showReactions: false },
        { author: { name: 'アレックス・トンプソン', role: 'シニアプロダクトデザイナー', avatar: 'AT' }, timestamp: '4時間前', content: 'チームとの素晴らしいデザインスプリントを終えたばかりです。新しいダッシュボードのモックアップは素晴らしく見えます！来週さらに詳しくシェアするのが待ちきれません。お楽しみに！💡', likes: 89, comments: 21, shares: 7, liked: false, showReactions: false },
        { author: { name: 'レイチェル・フォスター', role: 'マーケティングディレクター', avatar: 'RF' }, timestamp: '6時間前', content: '最新のキャンペーンが100万インプレッションを達成しました！これはマーケティング、デザイン、コンテンツチーム全体の協力なしには不可能でした。皆さん、ありがとうございます！🎉', likes: 156, comments: 42, shares: 18, liked: false, showReactions: false },
        { author: { name: 'マーカス・ジョンソン', role: 'テックリード', avatar: 'MJ' }, timestamp: '8時間前', content: 'リマインダー：月例テックトークは明日の午後2時です。マイクロサービスアーキテクチャとベストプラクティスについて話します。すべてのエンジニアの参加を歓迎します！', likes: 67, comments: 15, shares: 9, liked: false, showReactions: false },
        { author: { name: 'リサ・チェン', role: '人事マネージャー', avatar: 'LC' }, timestamp: '10時間前', content: '採用中です！🎯 成長するチームに参加する才能ある人材を探しています。エンジニアリング、デザイン、プロダクト全体で複数のポジションが空いています。詳細はキャリアページをご覧ください。', likes: 143, comments: 56, shares: 31, liked: false, showReactions: false },
      ],
    };
  },
}).mount('#app');
</script>

</body>
</html>