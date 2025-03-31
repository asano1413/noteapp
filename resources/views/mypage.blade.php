<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700">
<header>
    <x-default-header/>
</header>
<main class="w-4/5 mx-auto mt-16 mb-24 bg-gray-700">
    <!-- ユーザー情報セクション -->
    <section class="bg-slate-600 p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold text-white mb-4">ユーザー情報</h2>
        <div class="text-white">
            <p><strong>名前:</strong> {{ auth()->user()->name }}</p>
            <p><strong>メールアドレス:</strong> {{ auth()->user()->email }}</p>
            <p><strong>登録日:</strong> {{ auth()->user()->created_at->format('Y年m月d日') }}</p>
        </div>
    </section>

    <!-- メモ一覧セクション -->
    <section class="bg-slate-600 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-white mb-4">作成したメモ一覧</h2>
        @if($notes->isEmpty())
            <p class="text-white">まだメモがありません。</p>
        @else
            <ul class="space-y-4">
                @foreach($notes as $note)
                    <li class="bg-slate-500 p-4 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-white">{{ $note->title }}</h3>
                        <p class="text-gray-300">{{ Str::limit($note->content, 100) }}</p>
                        <p class="text-gray-400 text-sm mt-2">作成日: {{ $note->created_at->format('Y年m月d日 H:i') }}</p>
                        <a href="{{ route('notes.show', $note->id) }}" class="text-cyan-500 hover:underline">詳細を見る</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</main>
<footer>
    <x-footer/>
</footer>
</body>
</html>
