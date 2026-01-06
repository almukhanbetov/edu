@extends('layouts.dashboard')

@section('content')
    <h2 class="text-2xl font-bold text-white mb-6">
        ➕ Создать видеокомнату
    </h2>

    <form method="post" action="{{ route('videoconf.store') }}"
        class="bg-slate-800/70 border border-slate-700 rounded-2xl p-6">
        @csrf

        <label class="block text-slate-300 mb-1">Название</label>
        <input type="text" name="title" class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3 mb-4"
            required>

        <label class="block text-slate-300 mb-1">Описание</label>
        <textarea name="description" class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3 mb-4"></textarea>

        <button class="bg-emerald-600 hover:bg-emerald-500 px-6 py-3 rounded-xl font-semibold">
            Создать
        </button>

    </form>
@endsection
