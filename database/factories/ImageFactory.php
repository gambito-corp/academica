<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => null,
            'imageable_id' => null,
            'imageable_type' => null,
        ];
    }

    public function Direccion(array $mods)
    {
        return $this->state(function (array $attributes) use($mods) {
            return [
                'url' => $this->faker->image('storage/app/'.$mods['carpeta'], $mods['ancho'], $mods['alto'], true),
            ];
        });
    }
}
