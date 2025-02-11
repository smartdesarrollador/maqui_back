<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\ClienteModel;
use App\Models\Cotizacion;
use App\Models\Moto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FormularioCotizacionController extends Controller
{
    /**
     * Guarda una nueva cotización
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validar los datos del formulario
            $validator = Validator::make($request->all(), [
                'tipo_moto' => 'required|string',
                'modelo' => 'required|string',
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'celular' => 'required|string|max:20',
                'correo_electronico' => 'required|email|max:255',
                'tipo_documento' => 'required|string|in:DNI',
                'numero_documento' => 'required|string|max:20',
                'departamento' => 'required|string|max:100',
                'provincia' => 'required|string|max:100',
                'distrito' => 'required|string|max:100',
                'tiempo_compra' => 'required|string|in:En una semana,El próximo mes,Aún no lo defino,En un año'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Iniciar transacción
            DB::beginTransaction();

            // Buscar o crear el cliente
            $cliente = ClienteModel::firstOrCreate(
                ['numero_documento' => $request->numero_documento],
                [
                    'nombre' => $request->nombres,
                    'apellido' => $request->apellidos,
                    'email' => $request->correo_electronico,
                    'telefono' => $request->celular,
                    'tipo_documento' => $request->tipo_documento,
                    'departamento' => $request->departamento,
                    'provincia' => $request->provincia,
                    'distrito' => $request->distrito,
                ]
            );

            // Buscar la moto por modelo
            $moto = Moto::whereHas('modelo', function ($query) use ($request) {
                $query->where('nombre', $request->modelo);
            })->firstOrFail();

            // Crear la cotización
            $cotizacion = Cotizacion::create([
                'cliente_id' => $cliente->id_cliente,
                'moto_id' => $moto->id_moto,
                'precio_total' => $moto->precio_base,
                'estado' => 'pendiente'
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Cotización creada exitosamente',
                'data' => [
                    'cotizacion_id' => $cotizacion->id_cotizacion,
                    'cliente' => $cliente,
                    'moto' => $moto
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear cotización: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la cotización',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
