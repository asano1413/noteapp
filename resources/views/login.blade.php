<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-600">
<header>
    <x-default-header/>
</header>
<main class="w-4/5 mx-auto mt-16 mb-24 bg-slate-600">
  <div class="flex flex-wrap lg:flex-nowrap">

    <div class="w-full lg:w-1/2 bg-slate-500 box-border p-8 rounded-md shadow-lg mr-2">
      <h2 class="text-2xl font-bold text-center text-white mb-6">ログイン</h2>
      <form action="{{ route('login') }}" method="post" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm text-white font-bold mb-2">メールアドレス</label>
          <input type="email" name="email" id="email" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 text-sm text-white font-bold mb-2">パスワード</label>
          <input type="password" name="password" id="password" class="shadow bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-center">
          <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline duration-300 ease-in-out focus:cursor-pointer">ログイン</button>
        </div>
      </form>
    </div>

    <div class="w-full lg:w-1/2 ml-2 bg-slate-500 text-white box-border p-8 rounded-md shadow-lg flex flex-col justify-center">
      <h2 class="text-2xl text-center font-bold mt-6 mb-8">初めての方へ</h2>
      <p class="text-center mb-12">登録をしてアプリをご利用くださいまし</p>
      <div class="mt-6 flex justify-center">
        <a href="{{ route('register') }}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          新規登録はこちら
        </a>
      </div>
    </div>
  </div>
</main>
<footer>
    <x-footer/>
</footer>
</body>
</html>
