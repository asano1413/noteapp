@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-slate-600 text-white shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-sky-400">
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 p-6">
        <h1 class="text-3xl font-bold text-white">投稿一覧</h1>
    </div>
    <div class="p-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('posts.create') }}" class="bg-cyan-600 hover:bg-cyan-400 text-white px-4 py-2 rounded-md shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                新規投稿
            </a>
        </div>
        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="bg-gray-700 p-4 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                    <h2 class="text-xl font-bold text-cyan-400">
                        <a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ $post->title }}</a>
                    </h2>
                    <p class="text-gray-300 mt-2">{{ Str::limit($post->content, 100) }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
