<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Repuesto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Exception;

class RepuestoController extends Controller
{
    /**
     * Obtener listado de repuestos
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Repuesto::with(['tipoRepuesto', 'motos']);

            // Búsqueda por nombre
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where('nombre', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('tipo', 'LIKE', "%{$searchTerm}%");
            }

            // Ordenar por fecha de creación descendente
            $query->orderBy('created_at', 'desc');

            // Paginación
            $perPage = $request->input('per_page', 10); // 10 items por página por defecto
            $repuestos = $query->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Repuestos obtenidos exitosamente',
                'data' => $repuestos
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener repuestos: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los repuestos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacenar un nuevo repuesto
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'tipo' => 'required|string|max:100', 
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'descripcion' => 'required|string',
                'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tipo_repuesto_id' => 'required|exists:tipo_repuestos,id_tipo_repuesto'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            // Crear directorio si no existe
            $rutaDestino = public_path('assets/imagen/repuesto');
            if (!file_exists($rutaDestino)) {
                mkdir($rutaDestino, 0777, true);
            }
            
            // Mover imagen al directorio público
            $imagen->move($rutaDestino, $nombreImagen);
            
            $rutaImagen = 'assets/imagen/repuesto/' . $nombreImagen;

            $repuesto = Repuesto::create([
                'nombre' => $request->nombre,
                'tipo' => $request->tipo,
                'precio' => $request->precio,
                'stock' => $request->stock,
                'descripcion' => $request->descripcion,
                'imagen' => $rutaImagen,
                'tipo_repuesto_id' => $request->tipo_repuesto_id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Repuesto creado exitosamente',
                'data' => $repuesto
            ], 201);
        } catch (Exception $e) {
            Log::error('Error al crear repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el repuesto', 
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un repuesto específico
     */
    public function show(int $id): JsonResponse
    {
        try {
            $repuesto = Repuesto::with(['tipoRepuesto', 'motos'])
                ->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Repuesto obtenido exitosamente',
                'data' => $repuesto
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Repuesto no encontrado',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar un repuesto específico
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $repuesto = Repuesto::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nombre' => 'string|max:255',
                'tipo' => 'string|max:100', 
                'precio' => 'numeric|min:0',
                'stock' => 'integer|min:0',
                'descripcion' => 'string',
                'imagen' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'tipo_repuesto_id' => 'exists:tipo_repuestos,id_tipo_repuesto'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior
                if ($repuesto->imagen) {
                    $rutaAnterior = public_path('assets/imagen/repuestos/') . basename($repuesto->imagen);
                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                    }
                }

                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $rutaDestino = public_path('assets/imagen/repuestos/');
                
                if (!file_exists($rutaDestino)) {
                    mkdir($rutaDestino, 0777, true);
                }
                
                $imagen->move($rutaDestino, $nombreImagen);
                $request->merge(['imagen' => '/assets/imagen/repuestos/' . $nombreImagen]);
            }

            $repuesto->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Repuesto actualizado exitosamente',
                'data' => $repuesto
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar el repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un repuesto específico
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $repuesto = Repuesto::findOrFail($id);

            // Eliminar imagen asociada
            if ($repuesto->imagen) {
                Storage::delete(str_replace('/storage', 'public', $repuesto->imagen));
            }

            $repuesto->delete();

            return response()->json([
                'status' => true,
                'message' => 'Repuesto eliminado exitosamente'
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar el repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
