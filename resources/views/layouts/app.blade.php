<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'DevOps Academy') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    <meta name="description" content="@yield('meta_description', 'Обучение программированию и DevOps')">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>

<body class="bg-slate-950 text-gray-100 font-inter">

    <div class="min-h-screen flex">
        {{-- LEFTBAR --}}
        <aside class="w-64 bg-slate-900 hidden md:flex flex-col">
            <div class="p-4 text-xl font-bold text-green-400">
                <img src="{{ asset('img/complex.png') }}" alt="complex" height="120" width="120">
            </div>
            <nav class="flex-1 px-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:bg-slate-800">
                    🏠 Главная
                </a>
                <a href="{{ route('courses.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">
                    📚 Курсы
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-800">
                        🎓 Мои уроки
                    </a>
                @endauth
                @can('admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-3 py-2 rounded hover:bg-slate-800 text-yellow-400">
                        ⚙️ Админка
                    </a>
                @endcan
            </nav>
        </aside>
        {{-- MAIN --}}
        <div class="flex-1 flex flex-col">
            {{-- HEADER --}}
            <header class="h-14 bg-slate-900 border-b border-slate-800 flex items-center justify-between px-6">
                <div class="font-semibold">
                    @yield('title', 'Платформа обучения')
                </div>
                <div class="flex items-center gap-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white">
                            Вход
                        </a>
                        <a href="{{ route('register') }}" class="px-3 py-1 bg-green-500 text-black rounded text-sm">
                            Регистрация
                        </a>
                    @endguest
                    @auth
                        @can('admin-panel')
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-3 py-2 rounded hover:bg-slate-800 text-yellow-400">
                                ⚙️ Админка
                            </a>
                        @endcan
                        <span class="text-sm text-gray-400">
                            {{ auth()->user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm text-red-400 hover:text-red-300">
                                Выход
                            </button>
                        </form>
                    @endauth
                </div>
            </header>
            {{-- CONTENT --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>

</body>

</html>
