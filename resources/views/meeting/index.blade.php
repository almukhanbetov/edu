@extends('layouts.dashboard')
@section('title', 'Видеоконференции')
@section('content')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">
            📹 Видеоконференции
        </h2>
        {{-- кнопка создания комнаты --}}
        <a href="{{ route('videoconf.create') }}"
            class="bg-emerald-600 hover:bg-emerald-500 px-5 py-2 rounded-xl font-semibold">
            ➕ Создать комнату
        </a>

        @if (auth()->user()->role === 'teacher')
            <a href="{{ route('videoconf.create') }}"
                class="bg-emerald-600 hover:bg-emerald-500 px-5 py-2 rounded-xl font-semibold">
                ➕ Создать комнату
            </a>
        @endif
    </div>

    @forelse($rooms as $room)
        <div class="bg-slate-800/70 border border-slate-700 rounded-2xl p-5 mb-4">

            <div class="flex justify-between items-center">

                <div>
                    <div class="text-lg font-bold text-white">
                        {{ $room->title }}
                    </div>

                    <div class="text-slate-400 text-sm">
                        Автор: {{ $room->creator->name }}
                    </div>
                </div>

                <a href="{{ route('videoconf.show', $room->id) }}"
                    class="bg-blue-600 hover:bg-blue-500 px-6 py-2 rounded-xl font-semibold">
                    🔗 Войти
                </a>
            </div>

        </div>

    @empty
        <div class="text-slate-400">
            Комнат пока нет
        </div>
    @endforelse

@endsection
