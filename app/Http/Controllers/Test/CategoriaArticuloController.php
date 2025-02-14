<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\CategoriaArticulo;
use App\Http\Resources\CategoriaArticuloResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaArticuloController extends Controller
{
    /**
     * Obtener listado de categorías
     */
    public function index()
    {
        try {
            // Cargamos la relación de artículos para usar todos los campos del resource
            $categorias = CategoriaArticulo::with('articulos')->get();
            return response()->json([
                'status' => 'success',
                'data' => CategoriaArticuloResource::collection($categorias)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener las categorías',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear nueva categoría
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $categoria = CategoriaArticulo::create($request->all());
            
            // Cargamos la relación para el resource
            $categoria->load('articulos');

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría creada exitosamente',
                'data' => new CategoriaArticuloResource($categoria)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear la categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una categoría específica
     */
    public function show($id)
    {
        try {
            // Cargamos la relación de artículos
            $categoria = CategoriaArticulo::with('articulos')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => new CategoriaArticuloResource($categoria)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Categoría no encontrada',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar una categoría
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $categoria = CategoriaArticulo::findOrFail($id);
            $categoria->update($request->all());
            
            // Cargamos la relación para el resource
            $categoria->load('articulos');

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría actualizada exitosamente',
                'data' => new CategoriaArticuloResource($categoria)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar la categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar una categoría
     */
    public function destroy($id)
    {
        try {
            $categoria = CategoriaArticulo::with('articulos')->findOrFail($id);
            
            // Verificamos usando la relación cargada
            if ($categoria->articulos->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => "No se puede eliminar la categoría porque tiene {$categoria->articulos->count()} artículo(s) asociado(s). Elimine primero los artículos.",
                    'total_articulos' => $categoria->articulos->count(),
                    'precio_promedio' => $categoria->articulos->avg('precio')
                ], 400);
            }

            $categoria->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Categoría eliminada exitosamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar la categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
