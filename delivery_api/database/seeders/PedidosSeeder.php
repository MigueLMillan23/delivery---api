<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        DB::table('pedidos')->insert([
            ['cliente_id' => 1, 'repartidor_id' => 1, 'estado' => 'pendiente'],
            ['cliente_id' => 2, 'repartidor_id' => 2, 'estado' => 'en camino'],
            ['cliente_id' => 3, 'repartidor_id' => 3, 'estado' => 'entregado'],
        ]);
    }
}
