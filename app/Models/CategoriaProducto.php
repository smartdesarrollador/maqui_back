<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Producto;

class CategoriaProducto extends Model
{
    use HasFactory;

     protected $table = 'categoria_productos';

    protected $primaryKey = 'id_categoria_producto';


    public function productos()
    {
        return $this->hasMany(Producto::class, 'producto_id', 'id_producto');
    }
}
