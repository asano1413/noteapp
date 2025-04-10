<head>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<div class="bg-[#121212]">
  <div class="flex justify-between items-center p-4">
    <div>
      <button class="text-[#81D4FA] text-3xl font-bold px-4 py-2 transition-colors duration-500 ease-in-out hover:text-[#E0E0E0]">
        <a href="{{ url('/') }}">Note App</a>
      </button>
    </div>
    <div class="flex items-center space-x-4">
      @auth
        <button id="logoutButton" class="relative text-[#E0E0E0] no-underline transition-colors duration-300 hover:text-[#FFAB91] group">
          ログアウト
          <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
        </button>
      @else
        <a href="{{ route('login') }}" class="relative text-[#E0E0E0] no-underline transition-colors duration-300 hover:text-[#FFAB91] group">
          ログイン
          <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
        </a>
      @endauth
      <a href="{{ url('posts') }}" class="relative text-[#E0E0E0] no-underline transition-colors duration-300 hover:text-[#FFAB91] group">
        投稿
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="{{ url('/mypage') }}" class="relative text-[#E0E0E0] no-underline transition-colors duration-300 hover:text-[#FFAB91] group">
        マイページ
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="{{ url('/contact') }}" class="relative text-[#E0E0E0] no-underline transition-colors duration-300 hover:text-[#FFAB91] group">
        お問い合わせ
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <x-SearchModal/>
      <x-notification-modal/>
    </div>
  </div>
</div>

<div id="notificationModal" class="fixed inset-0 bg-[#121212] bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-[#2A2A2A] text-[#E0E0E0] rounded-lg p-6 w-1/3 shadow-lg">
    <h2 class="text-lg font-bold mb-4 text-[#81D4FA]">通知</h2>
    <ul class="list-disc pl-5">
      <li>通知はありません</li>
    </ul>
    <div class="flex justify-end mt-4">
      <button type="button" id="closeNotificationModal" class="bg-[#81D4FA] text-[#121212] px-4 py-2 rounded transition-colors duration-300 hover:bg-[#FFAB91] hover:text-[#121212]">
        閉じる
      </button>
    </div>
  </div>
</div>

<!-- ログアウト確認モーダル -->
<div id="logoutModal" class="fixed inset-0 bg-[#121212] bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-[#2A2A2A] text-[#E0E0E0] rounded-lg p-6 w-1/3 shadow-lg">
    <h2 class="text-lg font-bold mb-4 text-[#81D4FA]">ログアウト確認</h2>
    <p class="mb-6">本当にログアウトしますか？</p>
    <div class="flex justify-end space-x-4">
      <button id="cancelLogout" class="bg-[#81D4FA] text-[#121212] px-4 py-2 rounded transition-colors duration-300 hover:bg-[#FFAB91] hover:text-[#121212]">
        キャンセル
      </button>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-[#FFAB91] text-[#121212] px-4 py-2 rounded transition-colors duration-300 hover:bg-[#81D4FA] hover:text-[#121212]">
          ログアウト
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;

    // 検索モーダル
    const searchButton = document.getElementById('searchButton');
    const searchModal = document.getElementById('searchModal');
    const closeSearchModal = document.getElementById('closeSearchModal');

    searchButton.addEventListener('click', function () {
      searchModal.classList.remove('hidden');
      body.style.overflow = 'hidden'; // スクロールを無効化
    });

    closeSearchModal.addEventListener('click', function () {
      searchModal.classList.add('hidden');
      body.style.overflow = ''; // スクロールを有効化
    });

    // 通知モーダル
    const notificationButton = document.getElementById('notificationButton');
    const notificationModal = document.getElementById('notificationModal');
    const closeNotificationModal = document.getElementById('closeNotificationModal');

    notificationButton.addEventListener('click', function () {
      notificationModal.classList.remove('hidden');
      body.style.overflow = 'hidden'; // スクロールを無効化
    });

    closeNotificationModal.addEventListener('click', function () {
      notificationModal.classList.add('hidden');
      body.style.overflow = ''; // スクロールを有効化
    });

    // ログアウトモーダル
    const logoutButton = document.getElementById('logoutButton');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');

    logoutButton.addEventListener('click', function () {
      logoutModal.classList.remove('hidden');
      body.style.overflow = 'hidden'; // スクロールを無効化
    });

    cancelLogout.addEventListener('click', function () {
      logoutModal.classList.add('hidden');
      body.style.overflow = ''; // スクロールを有効化
    });
  });

  function searchModal() {
  return {
    isOpen: false,
    query: '',
    results: [],
    open() {
      this.isOpen = true;
      this.$nextTick(() => {
        const input = document.querySelector('input[x-model="query"]');
        input?.focus();
      });
    },
    close() {
      this.isOpen = false;
      this.query = '';
      this.results = [];
    },
    async submitSearch() {
      if (!this.query) return;

      try {
        const response = await fetch(`/search?query=${encodeURIComponent(this.query)}`);
        const data = await response.json();

        this.results = [
          ...data.users.map(user => ({ id: user.id, type: 'user', name: user.name })),
          ...data.posts.map(post => ({ id: post.id, type: 'post', title: post.title })),
        ];
      } catch (error) {
        console.error('検索中にエラーが発生しました:', error);
      }
    },
    selectSuggestion(suggestion) {
      this.query = suggestion;
      this.submitSearch();
    },
    init() {
      window.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
          e.preventDefault();
          this.open();
        }
      });
    },
  };
}
</script>
