@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4">

    <h1 class="text-2xl font-bold mb-4 text-white">
        {{ $course->title }}
    </h1>

    <p class="text-gray-400 mb-6">
        {{ $course->description }}
    </p>

    <div class="grid gap-3">
        @foreach($course->lessons as $lesson)
            <a href="{{ route('lesson.show', $lesson) }}"
               class="block p-4 bg-slate-800 rounded hover:bg-slate-700">
                {{ $lesson->title }}
            </a>
        @endforeach
    </div>

</div>
@endsection
