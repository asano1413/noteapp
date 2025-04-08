<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-[#1E1E1E] via-[#2A2A2A] to-[#121212] text-[#E0E0E0]">
  <header>
    <x-default-header/>
  </header>
  <main class="w-full mx-auto mt-16 mb-24">
    <div class="flex flex-col lg:flex-row justify-center items-center px-4">
      <div class="w-full lg:w-1/2 bg-[#2A2A2A] bg-opacity-90 backdrop-blur-md border border-gray-500 p-10 rounded-lg shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-[#81D4FA] mb-8">新規登録</h2>
        <form action="{{ route('register') }}" method="post" class="max-w-lg mx-auto">
          @csrf
          <div class="mb-6">
            <label for="name" class="block text-sm font-semibold mb-2 text-[#E0E0E0]">名前</label>
            <input type="text" name="name" id="name" placeholder="あなたの名前"
                   class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300">
          </div>
          <div class="mb-6">
            <label for="email" class="block text-sm font-semibold mb-2 text-[#E0E0E0]">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="example@example.com"
                   class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300">
          </div>
          <div class="mb-6">
            <label for="password" class="block text-sm font-semibold mb-2 text-[#E0E0E0]">パスワード</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300">
          </div>
          <div class="mb-8">
            <label for="password_confirmation" class="block text-sm font-semibold mb-2 text-[#E0E0E0]">パスワード（確認用）</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-lg border border-gray-500 bg-[#1E1E1E] text-[#E0E0E0] focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition duration-300">
          </div>
          <div class="flex justify-center">
            <button type="submit" class="bg-[#FFA726] hover:bg-[#FB8C00] text-[#121212] font-bold py-3 px-8 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#FFA726]">
              登録
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <footer class="bg-[#121212]">
    <x-footer/>
  </footer>
</body>
</html>
