@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <!-- Заголовок -->
    <h1 class="text-2xl font-semibold text-white mb-6">
        Профиль
    </h1>

    <!-- Карточка профиля -->
    <div class="bg-[#0f172a] border border-white/10 rounded-2xl p-6 flex items-center gap-6">

        <!-- Аватар -->
        <div class="w-20 h-20 rounded-full bg-green-600 flex items-center justify-center
                    text-3xl font-bold text-white">
            {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
        </div>

        <!-- Инфо -->
        <div class="flex-1">
            <div class="text-xl font-semibold text-white">
                {{ Auth::user()->name }}
            </div>

            <div class="text-sm text-gray-400">
                {{ Auth::user()->email }}
            </div>

            <div class="mt-2 inline-flex items-center px-3 py-1 rounded-full
                        text-xs font-medium
                        {{ Auth::user()->role === 'admin'
                            ? 'bg-red-500/10 text-red-400'
                            : 'bg-green-500/10 text-green-400' }}">
                {{ Auth::user()->role }}
            </div>
        </div>

        <!-- Действия -->
        <div class="flex flex-col gap-2">
            <a href="{{ route('profile.edit') }}"
               class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10
                      text-sm text-white transition text-center">
                ✏️ Редактировать
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-red-500/10 hover:bg-red-500/20
                               text-sm text-red-400 transition">
                    🚪 Выйти
                </button>
            </form>
        </div>
    </div>

    <!-- Дополнительные блоки -->
    <div class="grid md:grid-cols-2 gap-6 mt-8">

        <!-- Безопасность -->
        <div class="bg-[#0f172a] border border-white/10 rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-white mb-2">
                🔐 Безопасность
            </h2>
            <p class="text-sm text-gray-400 mb-4">
                Управление паролем и безопасностью аккаунта
            </p>

            <a href="{{ route('password.request') }}"
               class="text-sm text-green-400 hover:underline">
                Сменить пароль →
            </a>
        </div>

        <!-- Аккаунт -->
        <div class="bg-[#0f172a] border border-white/10 rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-white mb-2">
                ⚙️ Аккаунт
            </h2>
            <p class="text-sm text-gray-400 mb-4">
                Настройки и персональные данные
            </p>

            <a href="{{ route('profile.edit') }}"
               class="text-sm text-green-400 hover:underline">
                Перейти к настройкам →
            </a>
        </div>

    </div>
</div>
@endsection
