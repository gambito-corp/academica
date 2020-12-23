<?php

namespace App\Http\Controllers;

use App\Models\Image as Imagen;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function index()
    {
        $post = Post::whereId(1)->first();
        return view('welcome', compact('post'));
    }

    public function getImage($id)
    {
        $data = Imagen::whereId($id)->first();
        $file = Image::make(Storage::disk('s3')->get('posts/'.$data->url));
        $file->response();
        return new Response($file, 200);
    }
}
