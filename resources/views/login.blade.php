<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    <x-default-header/>
</header>
<main>
  <h1 class="text-center text-3xl font-bold mt-8">ログイン</h1>
  <form action="{{ route('login') }}" method="post" class="mt-8 max-w-md mx-auto">
    @csrf
    <div class="mb-4">
      <label for="email" class="block text-gray-700 text-sm font-bold mb-2">メールアドレス</label>
      <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-6">
      <label for="password" class="block text-gray-700 text-sm font-bold mb-2">パスワード</label>
      <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">ログイン</button>
      <a href="{{ route('register') }}" class="inline-block align-baseline font-bold text-sm text-cyan-500 hover:text-cyan-800">新規登録</a>
    </div>
</main>
</body>
</html>
