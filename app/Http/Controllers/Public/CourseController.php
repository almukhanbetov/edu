<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Список курсов
     */
    public function index()
    {
        $courses = Course::latest()->paginate(9);

        return view('public.courses.index', compact('courses'));
    }

    /**
     * Страница курса
     */
    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)
            ->with('lessons')
            ->firstOrFail();

        return view('public.courses.show', compact('course'));
    }
}
