@extends('layouts.app')
@section('title', 'Обучение программированию и DevOps')
@section('content')
{{-- HERO --}}
<section class="mb-16">
    <div class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl p-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            Обучение программированию и DevOps
        </h1>
        <p class="text-gray-400 max-w-2xl mb-6">
            Реальное обучение backend-разработке и DevOps:
            Laravel, Go, Docker, CI/CD, VPS, Production.
        </p>
        <div class="flex gap-4">
            <a href="{{ route('courses.index') }}"
               class="px-6 py-3 bg-green-500 text-black rounded font-semibold">
                🚀 Начать обучение
            </a>

            <a href="#services"
               class="px-6 py-3 bg-slate-700 rounded">
                🛠 Услуги
            </a>
        </div>
    </div>
</section>
{{-- FEATURES --}}
<section class="grid md:grid-cols-3 gap-6 mb-16">
    <div class="bg-slate-900 p-6 rounded">
        <h3 class="font-semibold mb-2">📦 Реальные проекты</h3>
        <p class="text-sm text-gray-400">
            Не теория, а продакшн-кейсы с деплоем.
        </p>
    </div>
    <div class="bg-slate-900 p-6 rounded">
        <h3 class="font-semibold mb-2">⚙️ DevOps</h3>
        <p class="text-sm text-gray-400">
            Docker, CI/CD, VPS, SSL, очереди, мониторинг.
        </p>
    </div>
    <div class="bg-slate-900 p-6 rounded">
        <h3 class="font-semibold mb-2">💼 Услуги</h3>
        <p class="text-sm text-gray-400">
            Разработка, DevOps-сопровождение, консультации.
        </p>
    </div>
</section>

{{-- COURSES --}}
<section class="mb-16">
    <h2 class="text-xl font-semibold mb-6">Популярные курсы</h2>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($courses as $course)
            <a href="{{ route('courses.show', $course->slug) }}"
               class="block bg-slate-900 p-6 rounded hover:bg-slate-800">

                <h3 class="font-semibold mb-2">
                    {{ $course->title }}
                </h3>
                <p class="text-sm text-gray-400 mb-4">
                    {{ Str::limit($course->description, 90) }}
                </p>
                <span class="text-green-400 text-sm font-semibold">
                    {{ $course->is_paid ? 'Платный курс' : 'Бесплатно' }}
                </span>
            </a>
        @empty
            <p class="text-gray-500">Курсы скоро появятся</p>
        @endforelse
    </div>
</section>
{{-- SERVICES --}}
<section id="services">
    <h2 class="text-xl font-semibold mb-6">Услуги</h2>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-slate-900 p-6 rounded">
            <h3 class="font-semibold mb-2">🚀 Deploy & CI/CD</h3>
            <p class="text-sm text-gray-400">
                Настройка Docker, GitHub Actions, VPS.
            </p>
        </div>
        <div class="bg-slate-900 p-6 rounded">
            <h3 class="font-semibold mb-2">🧠 Консультации</h3>
            <p class="text-sm text-gray-400">
                Помощь с архитектурой и продакшном.
            </p>
        </div>
        <div class="bg-slate-900 p-6 rounded">
            <h3 class="font-semibold mb-2">💻 Разработка</h3>
            <p class="text-sm text-gray-400">
                Backend, API, админки, DevOps.
            </p>
        </div>
    </div>
</section>
@endsection
