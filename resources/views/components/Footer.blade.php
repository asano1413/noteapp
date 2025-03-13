<div class="bg-slate-700 p-4">
    <ul class="flex justify-start space-x-10 ml-24">
      <li><a href="{{ url('/posts') }}" class=" px-5 py-4 border-2 border-t-0 bg-slate-700 border-sky-500 text-sky-500 text-center rounded-xl rounded-t-none font-bold hover:bg-slate-200 hover:text-blue-500 duration-500 ease-in-out">投稿</a></li>
      <li><a href="{{ url('/profile') }}" class=" px-5 py-4 border-2 border-t-0 bg-slate-700 border-sky-500 text-sky-500 text-center rounded-xl rounded-t-none font-bold hover:bg-slate-200 hover:text-blue-500 duration-500 ease-in-out">マイページ</a></li>
      <li><a href="{{ url('/contact') }}" class="px-5 py-4 border-2 border-t-0 bg-slate-700 border-sky-500 text-sky-500 text-center rounded-xl rounded-t-none font-bold hover:bg-slate-200 hover:text-blue-500 duration-500 ease-in-out">お問い合わせ</a></li>
    </ul>
</div>
<script>
function toggleNotificationModal() {
    const modal = document.getElementById('notificationModal');
    modal.classList.toggle('hidden');
}
