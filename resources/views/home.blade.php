@extends('layouts.app')

@section('content')
    <h1 class="text-xl mb-4">Главная</h1>

    @auth
        <div
            id="react-user"
            data-user='@json($user)'
        ></div>
    @else
        <p class="text-gray-400">
            Войдите, чтобы увидеть профиль
        </p>
    @endauth
@endsection


