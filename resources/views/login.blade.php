<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-800 via-gray-700 to-gray-900 text-white">
  <header>
    <x-default-header/>
  </header>

  <main class="w-4/5 mx-auto mt-16 mb-24 bg-slate-600 bg-opacity-90 backdrop-blur-md rounded-lg shadow-2xl">
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-1/2 bg-slate-500 p-10 rounded-tl-lg lg:rounded-l-lg shadow-xl">
        <h2 class="text-3xl font-extrabold text-center text-white mb-8">ログイン</h2>
        <form action="{{ route('login') }}" method="post" class="max-w-lg mx-auto">
          @csrf
          <div class="mb-6">
            <label for="email" class="block text-sm font-semibold mb-2">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="example@example.com"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
          </div>
          <div class="mb-8 relative">
            <label for="password" class="block text-sm font-semibold mb-2">パスワード</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-slate-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
            <button type="button" id="togglePassword" class="absolute right-3 top-10 text-gray-500 hover:text-gray-700 focus:outline-none">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <div class="flex justify-center">
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
              ログイン
            </button>
          </div>
        </form>
      </div>

      <div class="w-full lg:w-1/2 bg-slate-500 p-10 rounded-br-lg lg:rounded-bl-none lg:rounded-r-lg shadow-xl flex flex-col items-center justify-center">
        <h2 class="text-3xl font-extrabold text-center mb-6">初めての方へ</h2>
        <p class="text-center mb-8 text-lg">ご登録いただくと、全ての機能がご利用いただけます。今すぐ始めましょう！</p>
        <a href="{{ route('register') }}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
          新規登録はこちら
        </a>
      </div>
    </div>
  </main>

  <footer class="bg-gray-800">
    <x-footer/>
  </footer>

  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordField = document.getElementById('password');
      const icon = this.querySelector('i');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
</body>
</html>
