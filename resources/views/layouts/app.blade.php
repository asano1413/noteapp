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
    <header>
      <x-default-header/>
    </header>
    <main class="flex-grow container mx-auto py-8 px-4">
        @yield('content')
    </main>
    <footer>
      <x-footer />
    </footer>
</body>
</html>
