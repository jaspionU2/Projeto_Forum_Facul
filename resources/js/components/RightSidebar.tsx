import { TrendingUp, Users } from 'lucide-react';

const TRENDING_TOPICS = [
  { tag: '#製品発売', posts: 234 },
  { tag: '#イノベーション', posts: 189 },
  { tag: '#チームビルディング', posts: 156 },
  { tag: '#第1四半期目標', posts: 142 },
  { tag: '#企業文化', posts: 98 },
];

const SUGGESTED_CONNECTIONS = [
  { name: '陳 美玲', role: 'プロダクトマネージャー', mutual: 12 },
  { name: 'マイケル・ロドリゲス', role: 'エンジニアリングリード', mutual: 8 },
  { name: 'エミリー・ワトソン', role: 'デザインディレクター', mutual: 15 },
  { name: '金 大輝', role: 'マーケティングマネージャー', mutual: 6 },
];

export function RightSidebar() {
  return (
    <aside className="w-80 h-screen sticky top-0 overflow-y-auto">
      <div className="p-6 space-y-6">
        {/* Trending Topics */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
          <div className="flex items-center gap-2 mb-4">
            <TrendingUp className="w-5 h-5 text-[#1e3a8a]" />
            <h3 className="font-semibold text-gray-900">トレンドトピック</h3>
          </div>
          <div className="space-y-3">
            {TRENDING_TOPICS.map((topic) => (
              <button
                key={topic.tag}
                className="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors"
              >
                <div className="font-medium text-[#1e3a8a] text-sm">
                  {topic.tag}
                </div>
                <div className="text-xs text-gray-500 mt-1">
                  {topic.posts} 件の投稿
                </div>
              </button>
            ))}
          </div>
        </div>

        {/* Suggested Connections */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
          <div className="flex items-center gap-2 mb-4">
            <Users className="w-5 h-5 text-[#1e3a8a]" />
            <h3 className="font-semibold text-gray-900">知り合いかもしれない人</h3>
          </div>
          <div className="space-y-4">
            {SUGGESTED_CONNECTIONS.map((person) => (
              <div key={person.name} className="flex items-start gap-3">
                <div className="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e3a8a] to-[#3b82f6] flex items-center justify-center flex-shrink-0">
                  <span className="text-white text-sm font-semibold">
                    {person.name.split(' ').map(n => n[0]).join('')}
                  </span>
                </div>
                <div className="flex-1 min-w-0">
                  <h4 className="font-medium text-gray-900 text-sm truncate">
                    {person.name}
                  </h4>
                  <p className="text-xs text-gray-500 truncate">{person.role}</p>
                  <p className="text-xs text-gray-400 mt-1">
                    共通のつながり {person.mutual} 人
                  </p>
                  <button className="mt-2 text-xs font-medium text-[#1e3a8a] hover:text-[#1e40af]">
                    つながる
                  </button>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Quick Stats */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
          <h3 className="font-semibold text-gray-900 mb-4">あなたのアクティビティ</h3>
          <div className="space-y-3">
            <div className="flex items-center justify-between">
              <span className="text-sm text-gray-600">プロフィール閲覧数</span>
              <span className="font-semibold text-gray-900">247</span>
            </div>
            <div className="flex items-center justify-between">
              <span className="text-sm text-gray-600">投稿インプレッション</span>
              <span className="font-semibold text-gray-900">1,834</span>
            </div>
            <div className="flex items-center justify-between">
              <span className="text-sm text-gray-600">つながり</span>
              <span className="font-semibold text-gray-900">342</span>
            </div>
          </div>
        </div>
      </div>
    </aside>
  );
}