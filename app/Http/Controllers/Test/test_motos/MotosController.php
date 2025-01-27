<?php

namespace App\Http\Controllers\Test\test_motos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\TipoMoto;
use App\Models\Accesorio;
use App\Models\Repuesto;
use App\Models\Resena;
use App\Models\Cotizacion;

class MotosController extends Controller
{
    /**
     * Test relación Moto -> Modelo -> Marca
     */
    public function testMotoModeloMarca()
    {
        try {
            $moto = Moto::with(['modelo.marca'])->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'marca' => $moto->modelo->marca->nombre
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Moto -> TipoMoto
     */
    public function testMotoTipo()
    {
        try {
            $moto = Moto::with('tipoMoto')->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'tipo' => $moto->tipoMoto->nombre
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Moto -> Accesorios (muchos a muchos)
     */
    public function testMotoAccesorios()
    {
        try {
            $moto = Moto::with('accesorios')->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'accesorios' => $moto->accesorios
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Moto -> Repuestos (muchos a muchos)
     */
    public function testMotoRepuestos()
    {
        try {
            $moto = Moto::with('repuestos')->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'repuestos' => $moto->repuestos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Moto -> Reseñas
     */
    public function testMotoResenas()
    {
        try {
            $moto = Moto::with(['resenas.cliente'])->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'resenas' => $moto->resenas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Moto -> Cotizaciones
     */
    public function testMotoCotizaciones()
    {
        try {
            $moto = Moto::with(['cotizaciones.cliente'])->first();
            return response()->json([
                'success' => true,
                'moto' => $moto->modelo->nombre,
                'cotizaciones' => $moto->cotizaciones
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test relación Marca -> Motos (a través de modelos)
     */
    public function testMarcaMotos()
    {
        try {
            $marca = Marca::with('motos')->first();
            return response()->json([
                'success' => true,
                'marca' => $marca->nombre,
                'motos' => $marca->motos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test completo de todas las relaciones de una moto
     */
    public function testFullMotoRelations()
    {
        try {
            $moto = Moto::with([
                'modelo.marca',
                'tipoMoto',
                'accesorios.tipoAccesorio',
                'repuestos.tipoRepuesto',
                'resenas.cliente',
                'cotizaciones.cliente'
            ])->first();

            return response()->json([
                'success' => true,
                'data' => [
                    'moto' => $moto->modelo->nombre,
                    'marca' => $moto->modelo->marca->nombre,
                    'tipo' => $moto->tipoMoto->nombre,
                    'accesorios' => $moto->accesorios,
                    'repuestos' => $moto->repuestos,
                    'resenas' => $moto->resenas,
                    'cotizaciones' => $moto->cotizaciones
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
