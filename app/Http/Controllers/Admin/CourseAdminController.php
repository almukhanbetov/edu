<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Str;

class CourseAdminController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'is_paid'     => 'boolean',
            'price'       => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['title']);

        Course::create($data);

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate([
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'is_paid'     => 'boolean',
            'price'       => 'nullable|integer',
        ]));

        return back();
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
}
