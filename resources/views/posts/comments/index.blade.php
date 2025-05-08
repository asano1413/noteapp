@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-[#2A2A2A] text-[#E0E0E0] shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-[#81D4FA]">
    <div class="bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] p-6">
        <h2 class="text-2xl font-bold text-[#121212]">コメント一覧</h2>
        <p class="text-[#121212] mt-2">投稿タイトル: {{ $post->title }}</p>
    </div>

    <div class="p-6 space-y-4">
        @forelse ($comments as $comment)
            <div class="bg-[#3A3A3A] p-4 rounded-md border border-[#4FC3F7]">
                <p class="text-[#E0E0E0]">{{ $comment->content }}</p>
                <p class="text-[#A0A0A0] text-sm mt-2">投稿者: {{ $comment->user->name }}</p>
                <p class="text-[#A0A0A0] text-sm">投稿日時: {{ $comment->created_at->format('Y年m月d日 H:i') }}</p>
            </div>
        @empty
            <p class="text-[#B0BEC5]">コメントはまだありません。</p>
        @endforelse
    </div>

    <div class="p-6 text-right">
        <a href="{{ route('posts.index') }}" class="text-[#81D4FA] hover:underline">← 投稿一覧に戻る</a>
    </div>
</div>
@endsection
