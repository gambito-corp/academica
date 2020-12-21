<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

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
            $post->Tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
