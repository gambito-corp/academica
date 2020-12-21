<?php

namespace Database\Factories;

use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word(20);
        return [
            'title' => $title,
            'slug' => Str::slug($title)
        ];
    }
}
