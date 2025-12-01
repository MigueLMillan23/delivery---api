<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre' => 'Hamburguesa', 'precio' => 12000, 'categoria_id' => 1],
            ['nombre' => 'Pizza', 'precio' => 25000, 'categoria_id' => 1],
            ['nombre' => 'Gaseosa', 'precio' => 4000, 'categoria_id' => 2],
            ['nombre' => 'Helado', 'precio' => 7000, 'categoria_id' => 3],
            ['nombre' => 'Pastel', 'precio' => 10000, 'categoria_id' => 3],
        ]);
    }
}
