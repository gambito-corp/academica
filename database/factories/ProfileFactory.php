<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'titulo' => null,
            'bio' => null,
            'web' => $this->faker->domainName,
            'facebook' => 'https://www.facebook.com/profile.php?id=100018287836640',
            'linkedin' => 'https://www.linkedin.com/in/pedroraguirre/',
            'youtube' => 'https://www.linkedin.com/in/pedroraguirre/'
        ];
    }
}
