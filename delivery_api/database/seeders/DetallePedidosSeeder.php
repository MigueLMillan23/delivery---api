<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallePedidosSeeder extends Seeder
{
    public function run()
    {
        DB::table('detalles_pedido')->insert([
            ['pedido_id' => 1, 'producto_id' => 1, 'cantidad' => 1, 'precio' => 12000],
            ['pedido_id' => 1, 'producto_id' => 3, 'cantidad' => 2, 'precio' => 4000],
            ['pedido_id' => 2, 'producto_id' => 2, 'cantidad' => 1, 'precio' => 25000],
            ['pedido_id' => 2, 'producto_id' => 3, 'cantidad' => 1, 'precio' => 4000],
            ['pedido_id' => 3, 'producto_id' => 4, 'cantidad' => 2, 'precio' => 7000],
        ]);
    }
}
