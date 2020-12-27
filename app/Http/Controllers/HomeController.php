<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $courses = Course::where('status', Course::PUBLICADO)->latest('id')->get()->take(12)->load('Image');
        $posts = Post::where('status', Post::PUBLICADO)->latest('id')->get()->take(12)->load('Image');
        return view('welcome', compact('courses', 'posts'));
    }
}
