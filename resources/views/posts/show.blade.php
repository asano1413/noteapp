@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-slate-600 text-white shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-sky-400">
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 p-6">
        <h1 class="text-3xl font-bold text-white">{{ $post->title }}</h1>
    </div>
    <div class="p-6">
        <p class="text-gray-300 mb-6">{{ $post->content }}</p>
        <div class="flex justify-end">
            <a href="{{ route('posts.comments', $post) }}" class="bg-cyan-600 hover:bg-cyan-400 text-white px-4 py-2 rounded-md shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                コメントを見る
            </a>
        </div>
    </div>
</div>
@endsection
