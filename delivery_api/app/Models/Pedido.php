<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // tabla real
    protected $fillable = ['cliente_id', 'repartidor_id', 'estado'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function repartidor() {
        return $this->belongsTo(Repartidor::class);
    }

    public function detalles() {
        return $this->hasMany(DetallePedido::class);
    }
}
