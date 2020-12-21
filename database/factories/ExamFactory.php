<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

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
            'attempts' => 1,
            'min' => '10',
            'max' => '20',
            'random' => true,
            'password' => '123456',
        ];
    }
}
