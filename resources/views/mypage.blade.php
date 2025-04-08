<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-[#1E1E1E] via-[#2A2A2A] to-[#121212] text-[#E0E0E0]">
<header>
    <x-default-header/>
</header>
<main class="w-4/5 mx-auto mt-16 mb-24">
    <!-- ユーザー情報セクション -->
    <section class="bg-[#2A2A2A] p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold text-[#81D4FA] mb-4">ユーザー情報</h2>
        <div class="text-[#E0E0E0]">
            <p><strong>名前:</strong> {{ auth()->user()->name }}</p>
            <p><strong>メールアドレス:</strong> {{ auth()->user()->email }}</p>
            <p><strong>登録日:</strong> {{ auth()->user()->created_at->format('Y年m月d日') }}</p>
        </div>
        <div class="mr-8 flex justify-end">
            <a href="{{ route('profile') }}" class="bg-[#FFA726] hover:bg-[#FB8C00] text-[#121212] font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#FFA726]">
                編集
            </a>
        </div>
    </section>

    <!-- 作成したメモ一覧セクション -->
    <section class="bg-[#2A2A2A] p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-[#81D4FA] mb-4">作成したメモ一覧</h2>
        @if($notes->isEmpty())
            <p class="text-[#E0E0E0]">まだメモがありません。</p>
        @else
            <ul class="space-y-4">
                @foreach($notes as $note)
                    <li class="bg-[#1E1E1E] p-4 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-[#81D4FA]">{{ $note->title }}</h3>
                        <p class="text-[#D3D3D3]">{{ Str::limit($note->content, 100) }}</p>
                        <p class="text-[#A0A0A0] text-sm mt-2">作成日: {{ $note->created_at->format('Y年m月d日 H:i') }}</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="{{ route('personal-notes.edit', $note->id) }}" class="bg-[#81D4FA] hover:bg-[#4FC3F7] text-[#121212] font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#81D4FA]">
                                編集
                            </a>
                            <form action="{{ route('personal-notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[#FFAB91] hover:bg-[#FF7043] text-[#121212] font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#FFAB91]">
                                    削除
                                </button>
                            </form>
                        </div>
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
