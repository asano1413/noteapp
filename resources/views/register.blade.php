<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-800 via-gray-700 to-gray-900">
  <header>
    <x-default-header/>
  </header>
  <main class="w-full mx-auto mt-16 mb-24">
    <div class="flex flex-col lg:flex-row justify-center items-center px-4">
      <div class="w-full lg:w-1/2 bg-slate-600 bg-opacity-90 backdrop-blur-md border border-gray-300 p-10 rounded-lg shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-white mb-8">新規登録</h2>
        <form action="{{ route('register') }}" method="post" class="max-w-lg mx-auto">
          @csrf
          <div class="mb-6">
            <label for="name" class="block text-white text-sm font-bold mb-2">名前</label>
            <input type="text" name="name" id="name" placeholder="あなたの名前" class="w-full px-4 py-3 rounded-lg border border-gray-400 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
          </div>
          <div class="mb-6">
            <label for="email" class="block text-white text-sm font-bold mb-2">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="example@example.com" class="w-full px-4 py-3 rounded-lg border border-gray-400 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
          </div>
          <div class="mb-6">
            <label for="password" class="block text-white text-sm font-bold mb-2">パスワード</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-lg border border-gray-400 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
          </div>
          <div class="mb-8">
            <label for="password_confirmation" class="block text-white text-sm font-bold mb-2">パスワード（確認用）</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="w-full px-4 py-3 rounded-lg border border-gray-400 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
          </div>
          <div class="flex justify-center">
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
              登録
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <footer class="bg-gray-800">
    <x-footer/>
  </footer>
</body>
</html>
