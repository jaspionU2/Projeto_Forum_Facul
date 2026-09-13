import { CreatePost } from './CreatePost';
import { Post } from './Post';

const MOCK_POSTS = [
  {
    author: {
      name: 'ジェシカ・マルティネス',
      role: 'エンジニアリング担当副社長',
      avatar: 'JM',
    },
    timestamp: '2時間前',
    content: '第1四半期の結果を発表できることを嬉しく思います！私たちのチームはすべての期待を上回り、優れたパフォーマンスを発揮しました。これを可能にしてくれた皆様に心から感謝します。さらに良い第2四半期に向けて！🚀',
    likes: 128,
    comments: 34,
    shares: 12,
  },
  {
    author: {
      name: 'アレックス・トンプソン',
      role: 'シニアプロダクトデザイナー',
      avatar: 'AT',
    },
    timestamp: '4時間前',
    content: 'チームとの素晴らしいデザインスプリントを終えたばかりです。新しいダッシュボードのモックアップは素晴らしく見えます！来週さらに詳しくシェアするのが待ちきれません。お楽しみに！💡',
    likes: 89,
    comments: 21,
    shares: 7,
  },
  {
    author: {
      name: 'レイチェル・フォスター',
      role: 'マーケティングディレクター',
      avatar: 'RF',
    },
    timestamp: '6時間前',
    content: '最新のキャンペーンが100万インプレッションを達成しました！これはマーケティング、デザイン、コンテンツチーム全体の協力なしには不可能でした。皆さん、ありがとうございます！🎉',
    likes: 156,
    comments: 42,
    shares: 18,
  },
  {
    author: {
      name: 'マーカス・ジョンソン',
      role: 'テックリード',
      avatar: 'MJ',
    },
    timestamp: '8時間前',
    content: 'リマインダー：月例テックトークは明日の午後2時です。マイクロサービスアーキテクチャとベストプラクティスについて話します。すべてのエンジニアの参加を歓迎します！素晴らしい議論を楽しみにしています。',
    likes: 67,
    comments: 15,
    shares: 9,
  },
  {
    author: {
      name: 'リサ・チェン',
      role: '人事マネージャー',
      avatar: 'LC',
    },
    timestamp: '10時間前',
    content: '採用中です！🎯 成長するチームに参加する才能ある人材を探しています。エンジニアリング、デザイン、プロダクト全体で複数のポジションが空いています。詳細はキャリアページをご覧ください。一緒に素晴らしいものを作りましょう！',
    likes: 143,
    comments: 56,
    shares: 31,
  },
];

export function PostFeed() {
  return (
    <div className="flex-1 max-w-2xl mx-auto">
      <div className="space-y-6">
        <CreatePost />
        {MOCK_POSTS.map((post, index) => (
          <Post key={index} {...post} />
        ))}
      </div>
    </div>
  );
}