<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonProgress;

class LessonProgressController extends Controller
{
    public function complete(Lesson $lesson)
    {
        $user = auth()->user();

        // защита от повторного клика
        LessonProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
            ],
            [
                'completed' => true,
                'completed_at' => now(),
            ]
        );

        return back()->with('success', 'Урок отмечен как пройденный');
    }
}
