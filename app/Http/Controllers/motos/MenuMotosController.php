<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\TipoMoto;
use App\Models\Moto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class MenuMotosController extends Controller
{
    /**
     * Obtiene los tipos de motos con sus motos relacionadas
     *
     * @return JsonResponse
     */
    public function getMenuMotos(): JsonResponse
    {
        try {
            $tiposMotos = TipoMoto::with(['motos' => function ($query) {
                $query->select([
                    'id_moto',
                    'modelo_id',
                    'tipo_moto_id',
                    'precio_base',
                    'imagen',
                    'stock'
                ])
                ->with(['modelo' => function ($q) {
                    $q->select('id_modelo', 'marca_id', 'nombre')
                        ->with(['marca' => function ($m) {
                            $m->select('id_marca', 'nombre');
                        }]);
                }])
                ->where('stock', '>', 0);
            }])
            ->select('id_tipo_moto', 'nombre')
            ->get()
            ->map(function ($tipoMoto) {
                return [
                    'id' => $tipoMoto->id_tipo_moto,
                    'nombre' => $tipoMoto->nombre,
                    'motos' => $tipoMoto->motos->map(function ($moto) {
                        return [
                            'id' => $moto->id_moto,
                            'nombre' => $moto->modelo->nombre,
                            'marca' => $moto->modelo->marca->nombre,
                            'precio' => $moto->precio_base,
                            'imagen' => $moto->imagen,
                            'stock' => $moto->stock
                        ];
                    })
                ];
            });

            return response()->json($tiposMotos, 200);

        } catch (\Exception $e) {
            Log::error('Error al obtener menú de motos: ' . $e->getMessage());
                        
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener el menú de motos'
            ], 500);
        }
    }
}
