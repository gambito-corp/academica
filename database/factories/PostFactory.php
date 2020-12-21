<?php

namespace Database\Factories;

use App\Models\CategoryBlogs;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(5);
        return [
            'user_id'           => User::all()->random()->id,
            'category_post_id'  => CategoryPost::all()->random()->id,
            'title'             => $title,
            'slug'              => Str::slug($title),
            'extract'           => $this->faker->text(250),
            'body'              => $this->faker->text(2000),
            'status'            => $this->faker->randomElement([Post::BORRADOR, Post::REVISION, Post::PUBLICADO, Post::BLOQUEADO])
        ];
    }
}
