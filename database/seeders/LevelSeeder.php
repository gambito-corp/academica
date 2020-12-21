<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'title' => 'Basico'
        ]);
        Level::create([
            'title' => 'Facil'
        ]);
        Level::create([
            'title' => 'Intermedio'
        ]);
        Level::create([
            'title' => 'Avanzado'
        ]);
    }
}
