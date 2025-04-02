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
            font-size: 3rem;
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
<body class="bg-gray-700">
<header>
    <x-default-header/>
</header>
<main class="py-12 mt-24 flex flex-col items-center">
    <div class="typing-effect" id="typingEffect">Share_and_keep_your_Note !</div>
    <div class="text-white text-xl text-center my-20">自分用のメモ、共有用のノートを作成可能！</div>
    <div class="flex space-x-16 mt-8 w-full max-w-4xl">
        <div class="bg-slate-600 p-12 rounded-lg shadow-lg text-center border-2 border-sky-400 text-white flex-grow hover:bg-slate-700 hover:cursor-pointer transition duration-500 ease-in-out">
            <h2 class="text-xl font-bold mb-4">自分用のメモを作成</h2>
            <p class="mb-4">非公開の自分用のメモを作成</p>
            <a href="{{ url('/create-personal-note') }}" class="bg-cyan-600 text-white px-4 py-2 rounded-md hover:bg-cyan-400 duration-300 ease-in-out">作成</a>
        </div>
        <div class="bg-slate-600 p-4 rounded-lg shadow-lg text-center border-2 border-sky-400 text-white flex-grow hover:bg-slate-700 hover:cursor-pointer transition duration-500 ease-in-out">
            <h2 class="text-xl font-bold mt-8 mb-4">共有するノートを作成</h2>
            <p class="mb-4">他のユーザーと共有するノートを作成します。</p>
            <a href="{{ url('/posts/create') }}" class="bg-cyan-600 text-white px-4 py-2 rounded-md hover:bg-cyan-400 duration-300 ease-in-out">作成</a>
        </div>
    </div>
    <div class="mt-24">
        <a href="{{ url('/posts') }}" class="relative overflow-hidden bg-cyan-600 border-2 border-cyan-600 text-white px-4 py-2 rounded-md duration-300 ease-in-out hover:text-sky-600 hover:font-bold hover:bg-gray-50">他の人の投稿を見る</a>
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

