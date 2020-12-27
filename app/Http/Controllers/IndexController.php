<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image as Imagen;
use App\Models\Post;
use Hashids\Hashids;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{


    public function index()
    {
        //
    }

    public function test()
    {
        //
    }

    public function getImage($id)
    {
        $decode = new Imagen();
        $id = $decode->hash($id, true);
        dd($id);
        $data = Imagen::whereId($id)->first();
            $file = Image::make(Storage::disk('s3')->get($data->imageable::$carpeta . '/' . $data->url));
            $file->response();
        return new Response($file, 200);
    }
}
