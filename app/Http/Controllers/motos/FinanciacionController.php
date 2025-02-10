<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Financiamiento;
use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class FinanciacionController extends Controller
{
    /**
     * Mostrar listado de financiamientos con sus relaciones
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Financiamiento::with(['cotizacion.moto', 'cliente']);

            // Búsqueda por estado
            if ($request->has('estado')) {
                $query->where('estado', 'like', '%' . $request->estado . '%');
            }

            // Búsqueda por monto financiado
            if ($request->has('monto_min')) {
                $query->where('monto_financiado', '>=', $request->monto_min);
            }
            if ($request->has('monto_max')) {
                $query->where('monto_financiado', '<=', $request->monto_max);
            }

            // Búsqueda por cliente
            if ($request->has('cliente')) {
                $query->whereHas('cliente', function($q) use ($request) {
                    $q->where('nombre', 'like', '%' . $request->cliente . '%')
                      ->orWhere('apellido', 'like', '%' . $request->cliente . '%');
                });
            }

            // Búsqueda por fecha
            if ($request->has('fecha_inicio')) {
                $query->whereDate('created_at', '>=', $request->fecha_inicio);
            }
            if ($request->has('fecha_fin')) {
                $query->whereDate('created_at', '<=', $request->fecha_fin);
            }

            // Ordenamiento
            $sortField = $request->input('sort_by', 'created_at');
            $sortDirection = $request->input('sort_direction', 'desc');
            $query->orderBy($sortField, $sortDirection);

            // Paginación
            $perPage = $request->input('per_page', 10);
            $financiamientos = $query->paginate($perPage);

            return response()->json([
                'status' => 'success',
                'data' => $financiamientos->items(),
                'meta' => [
                    'total' => $financiamientos->total(),
                    'current_page' => $financiamientos->currentPage(),
                    'per_page' => $financiamientos->perPage(),
                    'last_page' => $financiamientos->lastPage()
                ]
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener financiamientos: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los financiamientos'
            ], 500);
        }
    }

    /**
     * Mostrar un financiamiento específico
     */
    public function show(int $id): JsonResponse
    {
        try {
            $financiamiento = Financiamiento::with([
                'cotizacion.moto.modelo.marca',
                'cotizacion.accesorios',
                'cotizacion.repuestos',
                'cliente'
            ])->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $financiamiento
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener financiamiento: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Financiamiento no encontrado'
            ], 404);
        }
    }

    /**
     * Crear un nuevo financiamiento
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'cotizacion_id' => 'required|exists:cotizaciones,id_cotizacion',
                'cliente_id' => 'required|exists:cliente,id_cliente',
                'monto_financiado' => 'required|numeric|min:0',
                'plazo' => 'required|integer|min:1',
                'interes' => 'required|numeric|min:0',
                'cuota_mensual' => 'required|numeric|min:0',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after:fecha_inicio',
                'estado' => 'required|string',
                'situacion_laboral' => 'required|string',
                'cuota_inicial' => 'required|numeric|min:0',
                'ingreso_mensual' => 'required|numeric|min:0'
            ]);

            DB::beginTransaction();

            $financiamiento = Financiamiento::create($validated);

            // Actualizar estado de la cotización
            $cotizacion = Cotizacion::findOrFail($validated['cotizacion_id']);
            $cotizacion->update(['estado' => 'financiado']);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Financiamiento creado exitosamente',
                'data' => $financiamiento
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error al crear financiamiento: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el financiamiento'
            ], 500);
        }
    }

    /**
     * Actualizar un financiamiento existente
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $financiamiento = Financiamiento::findOrFail($id);

            $validated = $request->validate([
                'monto_financiado' => 'numeric|min:0',
                'plazo' => 'integer|min:1',
                'interes' => 'numeric|min:0',
                'cuota_mensual' => 'numeric|min:0',
                'fecha_inicio' => 'date',
                'fecha_fin' => 'date|after:fecha_inicio',
                'estado' => 'string',
                'situacion_laboral' => 'string',
                'cuota_inicial' => 'numeric|min:0',
                'ingreso_mensual' => 'numeric|min:0'
            ]);

            DB::beginTransaction();

            $financiamiento->update($validated);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Financiamiento actualizado exitosamente',
                'data' => $financiamiento
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar financiamiento: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar el financiamiento'
            ], 500);
        }
    }

    /**
     * Eliminar un financiamiento
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $financiamiento = Financiamiento::findOrFail($id);
            
            // Actualizar estado de la cotización
            $cotizacion = $financiamiento->cotizacion;
            if ($cotizacion) {
                $cotizacion->update(['estado' => 'pendiente']);
            }

            $financiamiento->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Financiamiento eliminado exitosamente'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar financiamiento: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el financiamiento'
            ], 500);
        }
    }

    /**
     * Obtener financiamientos por cliente
     */
    public function getFinanciamientosByCliente(int $clienteId): JsonResponse
    {
        try {
            $financiamientos = Financiamiento::with(['cotizacion.moto', 'cliente'])
                ->where('cliente_id', $clienteId)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $financiamientos
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener financiamientos del cliente: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los financiamientos del cliente'
            ], 500);
        }
    }
}
