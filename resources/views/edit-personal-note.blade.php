@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-slate-600 text-white shadow-lg rounded-lg overflow-hidden mt-8 border-2 border-sky-400">
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 p-6">
        <h1 class="text-3xl font-bold text-white">ノート編集</h1>
    </div>
    <div class="p-6">
        <form action="{{ route('personal-notes.update', $personalNote->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="block text-sm font-semibold text-white mb-2">タイトル</label>
                <input type="text" name="title" id="title" value="{{ $personalNote->title }}" placeholder="タイトルを入力してください"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
            </div>
            <div class="mb-6">
                <label for="content" class="block text-sm font-semibold text-white mb-2">内容</label>
                <textarea name="content" id="content" rows="5" placeholder="内容を入力してください"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">{{ $personalNote->content }}</textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-600 hover:bg-cyan-400 text-white font-bold py-3 px-6 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
