<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(20)->create();
        foreach ($posts as $post){
            Storage::makeDirectory('posts');
            $image = Image::factory()->Direccion([
                'carpeta' => 'posts',
                'ancho' => '400',
                'alto' => '400'
            ])->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
            $contents = Storage::disk('Posts')->get($image->url);
            Storage::disk('s3')->put('posts/'.$image->url, $contents);
            Storage::deleteDirectory('posts');
            $post->Tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
