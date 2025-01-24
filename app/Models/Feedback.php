<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pedido;

class Feedback extends Model
{
    use HasFactory;

     protected $table = 'feedback';

    protected $primaryKey = 'id_feedback';

    public function pedidos()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'id_pedido');
    }
}
