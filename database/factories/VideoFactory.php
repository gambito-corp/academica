<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'platform_id' => 1,
            'lesson_id' => null,
            'url' => 'https://www.youtube.com/watch?v=52Qug_siqKw',
            'iframe' => "<iframe width='560' height='315' src='https://www.youtube.com/embed/GejDsZ0MDrA' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>",
        ];
    }
}
