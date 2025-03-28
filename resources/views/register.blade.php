<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700">
<header>
    <x-default-header/>
</header>
<main class="w-full mx-auto mt-16 mb-24 bg-gray-700">
    <div class="flex flex-wrap lg:flex-nowrap justify-center">
        <div class="w-full lg:w-1/2 bg-slate-600 box-border border-1 border-gray-100 p-8 rounded-md shadow-lg">
            <h2 class="text-2xl font-bold text-center text-white mb-6">新規登録</h2>
            <form action="{{ route('register') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm text-white font-bold mb-2">名前</label>
                    <input type="text" name="name" id="name" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm text-white font-bold mb-2">メールアドレス</label>
                    <input type="email" name="email" id="email" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm text-white font-bold mb-2">パスワード</label>
                    <input type="password" name="password" id="password" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm text-white font-bold mb-2">パスワード（確認用）</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-center mt-12">
                    <button type="submit" class="border border-white bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300 ease-in-out">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<footer>
    <x-footer/>
</footer>
</body>
</html>
