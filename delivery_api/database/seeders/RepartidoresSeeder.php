<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepartidoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('repartidores')->insert([
            ['nombre' => 'Andrés Morales', 'telefono' => '3101234567', 'disponible' => 1],
            ['nombre' => 'Sofía Herrera', 'telefono' => '3109876543', 'disponible' => 1],
            ['nombre' => 'Jorge Díaz', 'telefono' => '3112345678', 'disponible' => 1],
        ]);
    }
}
