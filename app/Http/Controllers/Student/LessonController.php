<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        // 🔒 проверка доступа к курсу
        $course = $lesson->course;

        if (!$course->hasAccess(auth()->user())) {
            abort(403);
        }

        // 🔒 только активные уроки
        if (!$lesson->is_active) {
            abort(404);
        }

        return view('public.lessons.show', compact('lesson', 'course'));
    }
}
