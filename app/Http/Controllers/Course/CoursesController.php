<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        return view('Course.index');
    }

    public function show(Course $course)
    {
        return view('Course.show', compact('course'));
    }
}
