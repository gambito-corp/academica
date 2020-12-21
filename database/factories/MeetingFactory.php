<?php

namespace Database\Factories;

use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => null,
            'title' => $this->faker->sentence(5),
            'started_at' => now(),
            'finaliced_at' => now(),
            'duration' => '300',
            'password' => '123456',
            'codigo' => '111222333666555444',
            'url' => $this->faker->url,
        ];
    }
}
