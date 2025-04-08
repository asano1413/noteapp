@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-[#2A2A2A] text-[#E0E0E0] shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-[#81D4FA]">
    <div class="bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] p-6">
        <h1 class="text-3xl font-bold text-[#121212]">{{ $post->title }}</h1>
    </div>
    <div class="p-6">
        <p class="text-[#D3D3D3] mb-6">{{ $post->content }}</p>
        <p class="text-[#A0A0A0] text-sm mt-2">作成日: {{ $post->created_at->format('Y年m月d日 H:i') }}</p>
        <p class="text-[#A0A0A0] text-sm mt-2">投稿者: {{ $post->user->name }}</p>
        <div class="flex justify-end mt-6">
            <a href="{{ route('posts.comments', $post) }}" class="bg-[#81D4FA] hover:bg-[#4FC3F7] text-[#121212] px-4 py-2 rounded-md shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#81D4FA]">
                コメントを見る
            </a>
        </div>
    </div>
</div>
@endsection
