@extends('layouts.app')

@section('title', $lesson->title)

@section('content')
<div class="max-w-4xl mx-auto">

    <h1 class="text-2xl font-bold mb-4">
        {{ $lesson->title }}
    </h1>

    {{-- Видео --}}
    @if($lesson->video_url)
        <div class="mb-6 aspect-video bg-black rounded overflow-hidden">
            <video controls class="w-full h-full">
                <source src="{{ $lesson->video_url }}" type="video/mp4">
            </video>
        </div>
    @endif

    {{-- Контент --}}
    <div class="prose prose-invert max-w-none mb-8">
        {!! nl2br(e($lesson->content)) !!}
    </div>

    {{-- Кнопка прогресса --}}
    @if(!$lesson->isCompletedBy(auth()->user()))
        <form method="POST" action="{{ route('lessons.complete', $lesson) }}">
            @csrf
            <button class="px-4 py-2 bg-green-500 text-black rounded">
                ✅ Отметить как пройденный
            </button>
        </form>
    @else
        <div class="text-green-400 font-semibold">
            ✔ Урок пройден
        </div>
    @endif

</div>
@endsection
