@extends('layouts.app')

@section('title', $course->title)

@section('content')
@auth
<div class="mb-6">
    <div class="text-sm text-gray-400 mb-1">
        Прогресс курса: {{ $course->progressFor(auth()->user()) }}%
    </div>

    <div class="w-full bg-slate-800 rounded h-2">
        <div
            class="bg-green-500 h-2 rounded"
            style="width: {{ $course->progressFor(auth()->user()) }}%">
        </div>
    </div>
</div>
@endauth

<h1 class="text-2xl font-bold mb-4">{{ $course->title }}</h1>

<p class="text-gray-400 mb-8">{{ $course->description }}</p>

<h2 class="text-lg font-semibold mb-4">Уроки</h2>

<div class="space-y-3">
@foreach($course->lessons as $lesson)
    <div class="bg-slate-900 p-4 rounded flex justify-between">
        <span>{{ $lesson->title }}</span>

        @auth
            @if($course->hasAccess(auth()->user()))
                <a href="{{ route('lesson.show', $lesson) }}"
                   class="text-green-400">Открыть</a>
            @else
                <span class="text-yellow-400">Требуется доступ</span>
            @endif
        @endauth
    </div>
@endforeach
</div>
@endsection
