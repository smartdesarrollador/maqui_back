<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\Feedback;
use App\Models\Producto;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $primaryKey = 'id_pedido';

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }

     public function feedback()
    {
        return $this->hasMany(Feedback::class, 'feedback_id', 'id_feedback');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_pedido', 'id_producto', 'id_pedido');
    }
}
