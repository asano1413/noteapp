@extends('layouts.app')

@section('content')
@auth
<div class="max-w-4xl mx-auto bg-[#2A2A2A] text-[#E0E0E0] shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-[#81D4FA]">
    <div class="bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] p-6">
        <h1 class="text-3xl font-bold text-[#121212]">新規投稿</h1>
    </div>
    <div class="p-6">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="title" class="block text-sm font-semibold text-[#E0E0E0] mb-2">タイトル</label>
                <input type="text" name="title" id="title" placeholder="タイトルを入力してください"
                       class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300">
            </div>
            <div class="mb-6">
                <label for="content" class="block text-sm font-semibold text-[#E0E0E0] mb-2">内容</label>
                <textarea name="content" id="content" rows="5" placeholder="内容を入力してください"
                          class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300"></textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('mypage') }}" class="bg-[#FFAB91] hover:bg-[#FF7043] text-[#121212] font-bold py-3 px-6 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#FFAB91]">
                    キャンセル
                </a>
                <button type="submit" class="bg-[#81D4FA] hover:bg-[#4FC3F7] text-[#121212] font-bold py-3 px-6 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#81D4FA]">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="max-w-4xl mx-auto bg-[#2A2A2A] text-[#E0E0E0] shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-[#81D4FA]">
    <div class="bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] p-6">
        <h1 class="text-3xl font-bold text-[#121212]">新規投稿</h1>
    </div>
    <div class="p-6">
        <p class="text-red-500">ログインしてください。</p>
    </div>
</div>
@endauth
@endsection
