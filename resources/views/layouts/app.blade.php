<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="description" content="Note App - シンプルで使いやすいノートアプリ">
    <meta name="author" content="Note App Team">
    <title>@yield('title', 'Note App')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-700 text-gray-800 min-h-screen flex flex-col">
    <header class="shadow-md bg-[#121212]">
        <x-default-header/>
    </header>
    <main class="flex-grow container mx-auto py-8 px-4 bg-[#1E1E1E] text-[#E0E0E0] rounded-lg shadow-lg mt-6">
        @yield('content')
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded my-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded my-4">
                {{ session('error') }}
            </div>
        @endif
    </main>
    <footer class="bg-[#121212] mt-6">
        <x-footer />
    </footer>
</body>
</html>
