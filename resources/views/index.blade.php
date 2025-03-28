<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @vite('resources/css/app.css')
    <style>
        .typing-effect {
            font-size: 2rem;
            font-weight: bold;
            text-decoration: underline;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            border-right: .15em solid orange;
            animation: blink-caret .75s step-end infinite;
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange }
        }
    </style>
</head>
<body>
<header>
    <x-default-header/>
</header>
<main class="bg-gray-700 py-12 flex flex-col items-center">
    <div class="typing-effect" id="typingEffect">Share_and_keep_your_Note !</div>
    <div class="text-white text-xl text-center mt-12">自分用のメモ、共有用のノートを作成可能！</div>
    <div class="flex space-x-16 mt-8 w-full max-w-4xl">
        <div class="bg-slate-600 p-12 rounded-lg shadow-lg text-center border-2 border-sky-400 text-white flex-grow hover:bg-slate-700 hover:cursor-pointer transition duration-500 ease-in-out">
            <h2 class="text-xl font-bold mb-4">自分用のメモを作成</h2>
            <p class="mb-4">非公開の自分用のメモを作成</p>
            <a href="{{ url('/create-personal-note') }}" class="bg-cyan-600 text-white px-4 py-2 rounded-md hover:bg-cyan-400 duration-300 ease-in-out">作成</a>
        </div>
        <div class="bg-slate-600 p-4 rounded-lg shadow-lg text-center border-2 border-sky-400 text-white flex-grow hover:bg-slate-700 hover:cursor-pointer transition duration-500 ease-in-out">
            <h2 class="text-xl font-bold mt-8 mb-4">共有するノートを作成</h2>
            <p class="mb-4">他のユーザーと共有するノートを作成します。</p>
            <a href="{{ url('/create-shared-note') }}" class="bg-cyan-600 text-white px-4 py-2 rounded-md hover:bg-cyan-400 duration-300 ease-in-out">作成</a>
        </div>
    </div>
    <div class="mt-24">
        <a href="{{ url('/shared-notes') }}" class="relative overflow-hidden bg-cyan-500 text-white px-4 py-2 rounded-md transition-colors duration-300 ease-in-out hover:bg-cyan-400 group">
          <span class="absolute inset-0 bg-cyan-600 transition-transform duration-300 ease-in-out transform skew-y-[-10deg] opacity-25 scale-y-0 group-hover:scale-y-100"></span>
          <span className="relative z-10">他の人の投稿を見る</a></span>
    </div>
</main>
<footer>
  <x-footer/>
</footer>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const typingEffect = document.getElementById('typingEffect');
    const text = typingEffect.textContent;
    typingEffect.textContent = '';
    let index = 0;

    function type() {
        if (index < text.length) {
            typingEffect.textContent += text.charAt(index);
            index++;
            setTimeout(type, 100);
        } else {
            typingEffect.style.borderRight = 'none';
        }
    }

    type();
});
</script>
</body>
</html>

