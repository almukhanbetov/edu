<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>

<body class="bg-gray-900 text-white">
    {{-- 🔝 NAVBAR --}}
    <nav class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            {{-- LOGO --}}
            <a href="/" class="text-lg font-bold text-green-500">
                MyPlatform
            </a>

            {{-- RIGHT SIDE --}}
            <div class="flex items-center gap-4">
                {{-- ГОСТЬ --}}
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">
                        Вход
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 rounded hover:bg-green-500">
                        Регистрация
                    </a>
                @endguest
                {{-- АВТОРИЗОВАН --}}
                @auth
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-7 h-7 rounded-full object-cover">
                    @else
                        <div
                            class="w-7 h-7 rounded-full bg-green-600
                flex items-center justify-center text-xs font-bold text-white">
                            {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <a href="{{ route('profile.show') }}"
                        class="px-4 py-2 bg-green-600 rounded hover:bg-white-400 relative z-50 hover:text-black transition">
                        {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 rounded hover:bg-red-500">
                            Выйти
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>

</html>
