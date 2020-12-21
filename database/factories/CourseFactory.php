<?php

namespace Database\Factories;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\Level;
use App\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);
        return [
            'user_id' => 1,
            'level_id' => Level::all()->random()->id,
            'category_course_id' => CategoryCourse::all()->random()->id,
            'prize_id' => Prize::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO, Course::BLOQUEADO]),
        ];
    }
}
