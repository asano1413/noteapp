<div class="bg-transparent">
  <div class="flex justify-between items-center p-4">
    <div>
      <button class="text-cyan-500 text-3xl font-bold px-4 py-2 transition-colors duration-500 ease-in-out hover:text-gray-50">
        <a href={{ url('/') }}>Note App</a>
      </button>
    </div>
    <div class="flex items-center space-x-4">
      <a href={{ url('/login') }} class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        ログイン
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href={{ url('/post') }} class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        投稿
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href={{ url('/mypage') }} class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
        マイページ
        <span class="absolute left-0 bottom-[-2px] w-0 h-[2px] bg-current transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href={{ url('/contct') }} class="relative text-white no-underline transition-colors duration-300 hover:text-gray-200 group">
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
  </>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const notificationButton = document.getElementById('notificationButton');

    searchButton.addEventListener('click', function(){
      console.log('hello');
    });

    notificationButton.addEventListener('click', function(){
      console.log('hello');
    });
  });
</script>
