<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-800 via-gray-700 to-gray-900 text-white">
<header>
    <x-default-header/>
</header>
<main class="w-4/5 mx-auto mt-16 mb-24 bg-slate-600 bg-opacity-90 backdrop-blur-md rounded-lg shadow-2xl">
    <div class="p-8">
        <h2 class="text-3xl font-extrabold text-center text-white mb-8">お問い合わせ</h2>
        <form action="{{ route('contact') }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-sm font-semibold mb-2">お名前</label>
                <input type="text" name="name" id="name" placeholder="お名前を入力してください"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
            </div>
            <div class="mb-6">
                <label for="email" class="block text-sm font-semibold mb-2">メールアドレス</label>
                <input type="email" name="email" id="email" placeholder="example@example.com"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
            </div>
            <div class="mb-6">
                <label for="message" class="block text-sm font-semibold mb-2">お問い合わせ内容</label>
                <textarea name="message" id="message" rows="5" placeholder="お問い合わせ内容を入力してください"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300"></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    送信
                </button>
            </div>
        </form>
    </div>
</main>
<footer>
    <x-footer/>
</footer>
</body>
</html>
