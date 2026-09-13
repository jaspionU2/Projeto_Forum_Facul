import { Home, Users, Briefcase, MessageSquare, Bell, Settings, TrendingUp, BookOpen } from 'lucide-react';

export function Sidebar() {
  const navigationItems = [
    { icon: Home, label: 'ホーム', active: true },
    { icon: Users, label: 'ネットワーク', active: false },
    { icon: Briefcase, label: '求人', active: false },
    { icon: MessageSquare, label: 'メッセージ', active: false },
    { icon: Bell, label: '通知', active: false },
    { icon: TrendingUp, label: '分析', active: false },
    { icon: BookOpen, label: '学習', active: false },
  ];

  return (
    <aside className="w-64 bg-white border-r border-gray-200 h-screen sticky top-0">
      <div className="p-6">
        <div className="flex items-center gap-3 mb-8">
          <div className="w-10 h-10 rounded-lg bg-[#1e3a8a] flex items-center justify-center">
            <span className="text-white font-semibold text-lg">CN</span>
          </div>
          <span className="font-semibold text-gray-900 text-lg">コープネット</span>
        </div>

        <nav className="space-y-1">
          {navigationItems.map((item) => (
            <button
              key={item.label}
              className={`w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-colors ${
                item.active
                  ? 'bg-[#1e3a8a] text-white'
                  : 'text-gray-700 hover:bg-gray-50'
              }`}
            >
              <item.icon className="w-5 h-5" />
              <span className="font-medium text-sm">{item.label}</span>
            </button>
          ))}
        </nav>

        <div className="mt-8 pt-8 border-t border-gray-200">
          <button className="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
            <Settings className="w-5 h-5" />
            <span className="font-medium text-sm">設定</span>
          </button>
        </div>
      </div>
    </aside>
  );
}