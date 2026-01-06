@extends('layouts.app')

@section('title', 'Мой профиль')

@section('content')

    <div class="p-6">
        <h2 class="text-xl text-white">Профиль</h2>

        <p class="text-gray-300 mt-4">Имя: {{ $user->name }}</p>
        <p class="text-gray-300">Email: {{ $user->email }}</p>

        <a href="{{ route('profile.edit', auth()->id()) }}" class="text-blue-400 mt-4 inline-block">
            Редактировать
        </a>
    </div>

@endsection
