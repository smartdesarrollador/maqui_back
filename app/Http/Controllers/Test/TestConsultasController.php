<?php

namespace App\Http\Controllers\Test;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\DetallePedido;


class TestConsultasController extends Controller
{
   public function consulta1(){

    
    /* $nombreTrabajador = Trabajador::pluck('primer_nombre');
    return $nombreTrabajador; */

    /* $Contratos1 = TipoContrato::where('id_tipo_contrato', 1)
            ->firstOrFail() 
            ->contratos;   
        return response()->json($Contratos1); */
   
   /* $num_trabajadores = Trabajador::count();
return $num_trabajadores; */

/* $todos_trabajadores = Trabajador::all();
return $todos_trabajadores; */

/* $ContratoById = Contrato::find(3);
return $ContratoById; */

/* $usuarios = User::find(1);
$roles = $usuarios->rol()->pluck('nombre')->toArray();
return $roles; */

/* $nombreCategoriaProducto = CategoriaProducto::pluck('nombre');
    return $nombreCategoriaProducto; */
   
/* $productoConCategoria = DB::table('productos')
    ->join('categoria_productos', 'productos.categoria_producto_id', '=', 'categoria_productos.id_categoria_producto')
    ->select('productos.nombre as nombre_producto', 'categoria_productos.nombre as nombre_categoria_producto')
    ->where('productos.id_producto', 1)
    ->first();
return $productoConCategoria; */

$fechaPedido = DB::table('productos')
    ->join('detalle_pedidos', 'productos.id_producto', '=', 'detalle_pedidos.producto_id')
    ->join('pedidos', 'detalle_pedidos.pedido_id', '=', 'pedidos.id_pedido')
    ->where('productos.id_producto', 1)
    ->select('pedidos.fecha_pedido')
    ->first();
    return $fechaPedido;


    }

}
