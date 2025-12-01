<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriasSeeder::class,
            ClientesSeeder::class,
            RepartidoresSeeder::class,
            ProductosSeeder::class,
            PedidosSeeder::class,
            DetallePedidosSeeder::class,
            
        ]);



    }
}
