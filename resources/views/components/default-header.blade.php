<div class="bg-transparent">
  <div class="flex justify-between items-center p-4">
    <div>
      <button class="text-cyan-500 text-3xl font-bold px-4 py-2 transition-colors duration-500 ease-in-out hover:text-gray-50">
        <a href="{{ url('/') }}">Note App</a>
      </button>
    </div>
    <div class="flex items-center space-x-4">
      @auth
        <button id="logoutButton" class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
          ログアウト
          <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
        </button>
      @else
        <a href="{{ route('login') }}" class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
          ログイン
          <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
        </a>
      @endauth
      <a href="{{ url('/post') }}" class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        投稿
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="{{ url('/mypage') }}" class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        マイページ
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="{{ url('/contact') }}" class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        お問い合わせ
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <button class="bg-slate-700 text-white border-2 rounded-lg border-white px-4 py-2 transition-colors duration-500 hover:bg-gray-50 hover:text-slate-700 hover:cursor-pointer" id="searchButton">
        <i class="fas fa-search"></i>
      </button>
      <button class="bg-slate-700 text-white border-2 rounded-lg border-white px-4 py-2 transition-colors duration-500 hover:bg-gray-50 hover:text-slate-700 hover:cursor-pointer" id="notificationButton">
        <i class="fas fa-bell"></i>
      </button>
    </div>
  </div>
</div>

<div id="logoutModal" class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg p-6 w-1/3">
    <h2 class="text-lg font-bold mb-4">ログアウト確認</h2>
    <p class="mb-6">本当にログアウトしますか？</p>
    <div class="flex justify-end space-x-4">
      <button id="cancelLogout" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">キャンセル</button>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">ログアウト</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const notificationButton = document.getElementById('notificationButton');

    searchButton.addEventListener('click', function(){
      console.log('Search button clicked');
    });

    notificationButton.addEventListener('click', function(){
      console.log('Notification button clicked');
    });
  });
  document.addEventListener('DOMContentLoaded', function () {
    const logoutButton = document.getElementById('logoutButton');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    logoutButton.addEventListener('click', function () {
      logoutModal.classList.remove('hidden');
    });
    cancelLogout.addEventListener('click', function () {
      logoutModal.classList.add('hidden');
    });
  });
</script>
