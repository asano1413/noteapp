<div class="w-full bg-gradient-to-r from-slate-600 to-slate-800 p-4 flex justify-between items-center">
    <div class="flex items-center">
        <a href="{{ url('/') }}" class="decoration-none">
            <h1 class="text-2xl font-bold mx-4 text-blue-400 hover:text-blue-300 duration-500 ease-in-out">佐脇翔也は今日も眠らない</h1>
        </a>
        <a href="{{ url('/posts') }}" class="text-white ml-4">投稿</a>
        <a href="{{ url('/mypage') }}" class="text-white ml-4">マイページ</a>
    </div>

    <div class="flex items-center space-x-5">
        <div class="flex items-center">
            <input type="text" placeholder="検索" class="p-2 rounded-md border border-white text-white">
            <button class="ml-1 p-2 bg-blue-500 text-white rounded-md">検索</button>
        </div>

        <button class="relative text-center p-2 bg-blue-500 text-white rounded-md" onclick="toggleNotificationModal()">
            通知
            <span id="unreadCount" class="absolute top-0 right-0 inline-block w-3 h-3 bg-red-500 rounded-full hidden"></span>
        </button>

        <button class="ml-4 p-2 bg-blue-500 text-white rounded-md" onclick="toggleFlyoutMenu()">マイページ設定</button>
    </div>
</div>

<div id="notificationModal" class="fixed inset-0 bg-gray-600 opacity-50 flex justify-center items-center hidden">
    <div class="bg-white w-3/5 opacity-100 p-6 rounded-md relative">
        <h2 class="text-xl text-center mb-4">通知</h2>
        <ul id="notificationList">
            <li class="mb-2 border-b border-gray-300 flex justify-between items-center p-4 bg-white">
                <span class="text-black">通知1</span>
                <button class="p-2 bg-blue-500 text-white rounded-md mr-4" onclick="markAsRead(this)">✓</button>
            </li>
            <li class="mb-2 border-b border-gray-300 flex justify-between items-center p-4 bg-white">
                <span class="text-black">通知2</span>
                <button class="p-2 bg-blue-500 text-white rounded-md mr-4" onclick="markAsRead(this)">✓</button>
            </li>
            <li class="mb-2 border-b border-gray-300 flex justify-between items-center p-4 bg-white">
                <span class="text-black">通知3</span>
                <button class="p-2 bg-blue-500 text-white rounded-md mr-4" onclick="markAsRead(this)">✓</button>
            </li>
        </ul>
        <button class="absolute top-4 right-4 p-2 bg-red-500 text-white rounded-md" onclick="toggleNotificationModal()">閉じる</button>
    </div>
</div>

<div id="flyoutMenu" class="fixed inset-0 bg-gray-600 opacity-50 flex justify-end items-start hidden">
    <div class="bg-white opacity-100 p-6 rounded-md mt-16 mr-4">
        <h2 class="text-xl mb-4">マイページ設定</h2>
        <ul>
            <li class="my-2"><a href="{{ url('/profile') }}">プロフィール</a></li>
            <li class="my-2"><a href="{{ url('/settings') }}">設定</a></li>
            <li class="my-2"><a href="{{ url('/logout') }}">ログアウト</a></li>
        </ul>
        <button class="mt-4 p-2 bg-red-500 text-white rounded-md" onclick="toggleFlyoutMenu()">閉じる</button>
    </div>
</div>

<script>
function toggleNotificationModal() {
    const modal = document.getElementById('notificationModal');
    modal.classList.toggle('hidden');
}

function toggleFlyoutMenu() {
    const menu = document.getElementById('flyoutMenu');
    menu.classList.toggle('hidden');
}

function markAsRead(button) {
    const listItem = button.parentElement;
    listItem.classList.add('bg-gray-200');
    button.disabled = true;
    updateUnreadCount();
}

function updateUnreadCount() {
    const unreadCount = document.querySelectorAll('#notificationList li:not(.bg-gray-200)').length;
    const unreadCountElement = document.getElementById('unreadCount');
    if (unreadCount > 0) {
        unreadCountElement.classList.remove('hidden');
    } else {
        unreadCountElement.classList.add('hidden');
    }
}

// 初期化
document.addEventListener('DOMContentLoaded', function() {
    updateUnreadCount();
});
</script>
