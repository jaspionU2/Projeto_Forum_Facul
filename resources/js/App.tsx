import { Sidebar } from './components/Sidebar';
import { PostFeed } from './components/PostFeed';
import { RightSidebar } from './components/RightSidebar';
import { Header } from './components/Header';

export default function App() {
  return (
    <div className="min-h-screen bg-[#f5f5f7]">
      <div className="flex">
        {/* Left Sidebar - Navigation */}
        <Sidebar />

        {/* Main Content Area + Right Sidebar */}
        <div className="flex-1 flex flex-col">
          {/* Top Header - spans full width */}
          <Header />
          
          <div className="flex flex-1">
            {/* Feed */}
            <main className="flex-1 py-6 px-8">
              <PostFeed />
            </main>

            {/* Right Sidebar - Trending & Suggestions */}
            <RightSidebar />
          </div>
        </div>
      </div>
    </div>
  );
}