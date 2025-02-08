<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class MarcaController extends Controller
{
    /**
     * Obtiene el listado de todas las marcas
     */
    public function index(): JsonResponse
    {
        try {
            $marcas = Marca::with('modelos')->get();
            
            return response()->json($marcas, 200);
        } catch (Exception $e) {
            Log::error('Error al obtener marcas: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener las marcas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacena una nueva marca
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:marcas,nombre',
                'origen' => 'required|string|max:255',
                'fundacion' => 'required|date',
                'logo' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $marca = Marca::create($validator->validated());

            return response()->json([
                'status' => true,
                'message' => 'Marca creada exitosamente',
                'data' => $marca
            ], 201);
        } catch (Exception $e) {
            Log::error('Error al crear marca: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la marca',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene una marca específica
     */
    public function show(int $id): JsonResponse
    {
        try {
            $marca = Marca::with(['modelos', 'motos'])->find($id);
            
            if (!$marca) {
                return response()->json([
                    'status' => false,
                    'message' => 'Marca no encontrada'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Marca obtenida exitosamente',
                'data' => $marca
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener marca: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener la marca',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualiza una marca específica
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $marca = Marca::find($id);

            if (!$marca) {
                return response()->json([
                    'status' => false,
                    'message' => 'Marca no encontrada'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nombre' => 'sometimes|required|string|max:255|unique:marcas,nombre,' . $id . ',id_marca',
                'origen' => 'sometimes|required|string|max:255',
                'fundacion' => 'sometimes|required|date',
                'logo' => 'sometimes|required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $marca->update($validator->validated());

            return response()->json([
                'status' => true,
                'message' => 'Marca actualizada exitosamente',
                'data' => $marca
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar marca: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la marca',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Elimina una marca específica
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $marca = Marca::find($id);

            if (!$marca) {
                return response()->json([
                    'status' => false,
                    'message' => 'Marca no encontrada'
                ], 404);
            }

            // Verificar si la marca tiene modelos asociados
            if ($marca->modelos()->count() > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No se puede eliminar la marca porque tiene modelos asociados'
                ], 409);
            }

            $marca->delete();

            return response()->json([
                'status' => true,
                'message' => 'Marca eliminada exitosamente'
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar marca: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la marca',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
