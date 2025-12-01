<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    use HasFactory;

    protected $table = 'repartidores'; // tabla real
    protected $fillable = ['nombre', 'telefono', 'disponible'];

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }
}
