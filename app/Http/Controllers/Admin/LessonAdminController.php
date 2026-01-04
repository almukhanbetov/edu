<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;




class LessonAdminController extends Controller
{
    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $course->lessons()->create(
            $request->validate([
                'title'     => 'required|string',
                'content'   => 'nullable|string',
                'video_url' => 'nullable|string',
                'order'     => 'integer',
            ])
        );

        return back();
    }
}
