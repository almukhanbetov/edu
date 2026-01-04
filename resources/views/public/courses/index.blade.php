@extends('layouts.app')

@section('title', 'Курсы')

@section('content')
<h1 class="text-2xl font-bold mb-6">Все курсы</h1>

<div class="grid md:grid-cols-3 gap-6">
@foreach($courses as $course)
    <a href="{{ route('courses.show', $course->slug) }}"
       class="block bg-slate-900 p-6 rounded hover:bg-slate-800">
        <h3 class="font-semibold mb-2">{{ $course->title }}</h3>
        <p class="text-sm text-gray-400 mb-3">
            {{ Str::limit($course->description, 100) }}
        </p>
        <span class="text-green-400 text-sm">
            {{ $course->is_paid ? 'Платный' : 'Бесплатный' }}
        </span>
    </a>
@endforeach
</div>

<div class="mt-8">
    {{ $courses->links() }}
</div>
@endsection
