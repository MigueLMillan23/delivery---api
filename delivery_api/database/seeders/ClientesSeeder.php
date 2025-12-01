<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes')->insert([
            ['nombre' => 'Miguel Millán', 'email' => 'miguel@mail.com', 'telefono' => '3001234567'],
            ['nombre' => 'Laura Gómez', 'email' => 'laura@mail.com', 'telefono' => '3009876543'],
            ['nombre' => 'Carlos Pérez', 'email' => 'carlos@mail.com', 'telefono' => '3012345678'],
            ['nombre' => 'Ana Torres', 'email' => 'ana@mail.com', 'telefono' => '3018765432'],
            ['nombre' => 'Luis Ramírez', 'email' => 'luis@mail.com', 'telefono' => '3005556677'],
        ]);
    }
}
