<!DOCTYPE html>
<html lang="ru" class="dark">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 to-slate-800 text-white">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-xs bg-slate-900/80 backdrop-blur rounded-xl p-6 shadow-xl">
            @yield('content')
        </div>
    </div>

</body>
</html>
