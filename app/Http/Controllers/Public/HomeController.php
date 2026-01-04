<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()
            ->take(6)
            ->get();

        return view('public.index', compact('courses'));
    }
}
