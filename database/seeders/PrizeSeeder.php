<?php

namespace Database\Seeders;

use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prize::create([
            'title' => 'gratis',
            'value' => '0'
        ]);
        Prize::create([
            'title' => 'Mensual',
            'value' => '9.99'
        ]);
        Prize::create([
            'title' => 'Trimestral',
            'value' => '19.99'
        ]);
        Prize::create([
            'title' => 'Anual',
            'value' => '99.99'
        ]);
    }
}
