<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ノート作成</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700">
<header>
    <x-default-header/>
</header>
<main>
    <div class="w-3/5 mx-auto border-slate-600 rounded-xl p-6 mt-16 mb-24 bg-slate-600">
        <h2 class="text-2xl font-bold text-center text-white my-6">ノート作成</h2>
        <form action="{{ route('create-personal-note') }}" method="post" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm text-white font-bold mb-2">タイトル</label>
                <input type="text" name="title" id="title" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm text-white font-bold mb-2">内容</label>
                <textarea name="content" id="content" class="shadow bg-slate-400 appearance-none border rounded w-full h-24 p-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300 ease-in-out">
                    作成
                </button>
                <a href="{{ route('index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300 ease-in-out">
                    破棄
                </a>
            </div>
        </form>
    </div>
</main>
<footer>
    <x-footer/>
</footer>
</body>
</html>
