@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 space-y-8">
        <!-- Заголовок -->
        <div>
            <h1 class="text-2xl font-semibold text-white">
                Настройки профиля
            </h1>
            <p class="text-sm text-gray-400">
                Управление личными данными и безопасностью
            </p>
        </div>
        <!-- === ОСНОВНЫЕ ДАННЫЕ === -->
        <div class="bg-[#0f172a] border border-white/10 rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-white mb-4">
                👤 Личная информация
            </h2>
            <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data"
                class="bg-[#0f172a] border border-white/10 rounded-2xl p-6 mb-8">
                @csrf

                <h2 class="text-lg font-semibold text-white mb-4">
                    🖼️ Аватар
                </h2>

                <div class="flex items-center gap-6">
                    <!-- текущий аватар -->
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            class="w-20 h-20 rounded-full object-cover">
                    @else
                        <div
                            class="w-20 h-20 rounded-full bg-green-600
                        flex items-center justify-center text-3xl font-bold text-white">
                            {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif

                    <!-- upload -->
                    <div>
                        <input type="file" name="avatar" accept="image/*"
                            class="block text-sm text-gray-300
                          file:bg-gray-700 file:border-0
                          file:px-4 file:py-2 file:rounded-lg
                          file:text-white file:hover:bg-gray-600">

                        <button type="submit"
                            class="mt-3 px-4 py-2 rounded-lg bg-green-600
                           hover:bg-green-500 text-white text-sm transition">
                            Загрузить
                        </button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')
                <!-- Имя -->
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Имя</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                           text-white focus:outline-none focus:ring-2 focus:ring-green-600">
                </div>
                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                           text-white focus:outline-none focus:ring-2 focus:ring-green-600">
                </div>
                <!-- Кнопка -->
                <div class="flex justify-end pt-6">
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-500
                           text-white text-sm font-medium transition">
                        💾 Сохранить
                    </button>
                </div>
            </form>
        </div>
        <!-- === СМЕНА ПАРОЛЯ === -->
        <div class="bg-[#0f172a] border border-white/10 rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-white mb-4">
                🔐 Смена пароля
            </h2>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Текущий пароль</label>
                    <input type="password" name="current_password"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                              text-white focus:ring-green-600">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Новый пароль</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                              text-white focus:ring-green-600">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Подтверждение</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                              text-white focus:ring-green-600">
                </div>

                <div class="flex justify-end pt-6">
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-500
                           text-white text-sm transition">
                        🔑 Обновить пароль
                    </button>
                </div>
            </form>
        </div>

        <!-- === УДАЛЕНИЕ АККАУНТА === -->
        <div class="bg-[#0f172a] border border-red-500/20 rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-red-400 mb-2">
                ⚠️ Удаление аккаунта
            </h2>
            <p class="text-sm text-gray-400 mb-4">
                Это действие необратимо.
            </p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-red-500/10 hover:bg-red-500/20
                       text-red-400 text-sm transition">
                    🗑 Удалить аккаунт
                </button>
            </form>
        </div>

    </div>
@endsection
