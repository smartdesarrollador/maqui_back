<?php

declare(strict_types=1);

namespace App\Http\Controllers\medios;

use App\Http\Controllers\Controller;
use App\Models\MediaCategoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MedioCategoriaController extends Controller
{
    /**
     * Muestra un listado de las categorías de medios.
     */
    public function index(): JsonResponse
    {
        try {
            $categorias = MediaCategoria::with(['parent', 'children'])
                ->orderBy('sort_order')
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $categorias
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener categorías de medios: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener las categorías'
            ], 500);
        }
    }

    /**
     * Almacena una nueva categoría de medios.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:media_categories',
                'description' => 'nullable|string',
                'is_active' => 'boolean',
                'sort_order' => 'nullable|integer',
                'parent_id' => 'nullable|exists:media_categories,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $categoria = MediaCategoria::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active ?? true,
                'sort_order' => $request->sort_order ?? 0,
                'parent_id' => $request->parent_id
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría creada exitosamente',
                'data' => $categoria
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear categoría de medios: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear la categoría'
            ], 500);
        }
    }

    /**
     * Muestra una categoría específica.
     */
    public function show(int $id): JsonResponse
    {
        try {
            $categoria = MediaCategoria::with(['parent', 'children', 'mediaFiles'])
                ->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $categoria
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener categoría de medios: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Categoría no encontrada'
            ], 404);
        }
    }

    /**
     * Actualiza una categoría específica.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $categoria = MediaCategoria::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:media_categories,name,' . $id,
                'description' => 'nullable|string',
                'is_active' => 'boolean',
                'sort_order' => 'nullable|integer',
                'parent_id' => 'nullable|exists:media_categories,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $categoria->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active ?? $categoria->is_active,
                'sort_order' => $request->sort_order ?? $categoria->sort_order,
                'parent_id' => $request->parent_id
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría actualizada exitosamente',
                'data' => $categoria
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar categoría de medios: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar la categoría'
            ], 500);
        }
    }

    /**
     * Elimina una categoría específica.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $categoria = MediaCategoria::findOrFail($id);

            // Verificar si tiene subcategorías
            if ($categoria->children()->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se puede eliminar la categoría porque tiene subcategorías'
                ], 422);
            }

            // Verificar si tiene archivos asociados
            if ($categoria->mediaFiles()->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se puede eliminar la categoría porque tiene archivos asociados'
                ], 422);
            }

            DB::beginTransaction();
            
            $categoria->delete();
            
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría eliminada exitosamente'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar categoría de medios: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar la categoría'
            ], 500);
        }
    }
}
