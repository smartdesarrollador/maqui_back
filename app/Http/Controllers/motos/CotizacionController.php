<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\ClienteModel;
use App\Models\Moto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CotizacionController extends Controller
{
    /**
     * Obtiene el listado de cotizaciones
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $query = Cotizacion::with(['cliente', 'moto', 'accesorios', 'repuestos', 'financiamiento']);

            // Búsqueda por estado
            if ($request->has('estado')) {
                $query->where('estado', 'like', '%' . $request->estado . '%');
            }

            // Búsqueda por precio total
            if ($request->has('precio_min')) {
                $query->where('precio_total', '>=', $request->precio_min);
            }
            if ($request->has('precio_max')) {
                $query->where('precio_total', '<=', $request->precio_max);
            }

            // Búsqueda por fecha
            if ($request->has('fecha_inicio')) {
                $query->whereDate('created_at', '>=', $request->fecha_inicio);
            }
            if ($request->has('fecha_fin')) {
                $query->whereDate('created_at', '<=', $request->fecha_fin);
            }

            // Búsqueda por cliente
            if ($request->has('cliente')) {
                $query->whereHas('cliente', function($q) use ($request) {
                    $q->where('nombre', 'like', '%' . $request->cliente . '%')
                      ->orWhere('apellido', 'like', '%' . $request->cliente . '%');
                });
            }

            // Búsqueda por moto
            if ($request->has('moto')) {
                $query->whereHas('moto', function($q) use ($request) {
                    $q->where('nombre', 'like', '%' . $request->moto . '%')
                      ->orWhere('modelo', 'like', '%' . $request->moto . '%');
                });
            }

            // Ordenamiento
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // Paginación
            $perPage = $request->get('per_page', 10);
            $cotizaciones = $query->paginate($perPage);

            return response()->json($cotizaciones, 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener cotizaciones: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacena una nueva cotización
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cliente_id' => 'required|exists:cliente,id_cliente',
                'moto_id' => 'required|exists:motos,id_moto',
                'precio_total' => 'required|numeric|min:0',
                'estado' => 'required|string',
                'accesorios' => 'array',
                'accesorios.*' => 'exists:accesorios,id_accesorio',
                'repuestos' => 'array',
                'repuestos.*' => 'exists:repuestos,id_repuesto'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $cotizacion = Cotizacion::create($request->only([
                'cliente_id',
                'moto_id',
                'precio_total',
                'estado'
            ]));

            if ($request->has('accesorios')) {
                $cotizacion->accesorios()->attach($request->accesorios);
            }

            if ($request->has('repuestos')) {
                $cotizacion->repuestos()->attach($request->repuestos);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cotización creada exitosamente',
                'data' => $cotizacion->load(['cliente', 'moto', 'accesorios', 'repuestos'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear cotización: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la cotización',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Muestra una cotización específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $cotizacion = Cotizacion::with(['cliente', 'moto', 'accesorios', 'repuestos', 'financiamiento'])
                ->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Cotización recuperada exitosamente',
                'data' => $cotizacion
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener cotización: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener la cotización',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualiza una cotización específica
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cliente_id' => 'exists:cliente,id_cliente',
                'moto_id' => 'exists:motos,id_moto',
                'precio_total' => 'numeric|min:0',
                'estado' => 'string',
                'accesorios' => 'array',
                'accesorios.*' => 'exists:accesorios,id_accesorio',
                'repuestos' => 'array',
                'repuestos.*' => 'exists:repuestos,id_repuesto'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $cotizacion = Cotizacion::findOrFail($id);
            $cotizacion->update($request->only([
                'cliente_id',
                'moto_id',
                'precio_total',
                'estado'
            ]));

            if ($request->has('accesorios')) {
                $cotizacion->accesorios()->sync($request->accesorios);
            }

            if ($request->has('repuestos')) {
                $cotizacion->repuestos()->sync($request->repuestos);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cotización actualizada exitosamente',
                'data' => $cotizacion->load(['cliente', 'moto', 'accesorios', 'repuestos'])
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar cotización: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la cotización',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Elimina una cotización específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $cotizacion = Cotizacion::findOrFail($id);
            
            // Eliminar relaciones
            $cotizacion->accesorios()->detach();
            $cotizacion->repuestos()->detach();
            
            // Eliminar financiamiento si existe
            if ($cotizacion->financiamiento) {
                $cotizacion->financiamiento->delete();
            }
            
            $cotizacion->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cotización eliminada exitosamente'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar cotización: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la cotización',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    
    
}
