<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticuloResource;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticuloController extends Controller
{
    /**
     * Mostrar listado de artículos
     */
    public function index()
    {
        try {
            $articulos = Articulo::with('categoria')->get();
            return ArticuloResource::collection($articulos);
        } catch (\Exception $e) {
            Log::error('Error al obtener artículos: ' . $e->getMessage());
            return response()->json(['message' => 'Error al obtener los artículos'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Almacenar un nuevo artículo
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric|min:0',
                'categoria_id' => 'required|exists:categoria_articulos,id'
            ]);

            DB::beginTransaction();
            $articulo = Articulo::create($request->all());
            DB::commit();

            return new ArticuloResource($articulo);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear artículo: ' . $e->getMessage());
            return response()->json(['message' => 'Error al crear el artículo'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Mostrar un artículo específico
     */
    public function show($id)
    {
        try {
            $articulo = Articulo::with('categoria')->find($id);
            
            if (!$articulo) {
                return response()->json([
                    'message' => 'Artículo no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }

            return new ArticuloResource($articulo);
        } catch (\Exception $e) {
            Log::error('Error al obtener artículo: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al obtener el artículo'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Actualizar un artículo específico
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'descripcion' => 'sometimes|required|string',
                'precio' => 'sometimes|required|numeric|min:0',
                'categoria_id' => 'sometimes|required|exists:categoria_articulos,id'
            ]);

            $articulo = Articulo::find($id);
            
            if (!$articulo) {
                return response()->json([
                    'message' => 'Artículo no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }

            DB::beginTransaction();
            $articulo->update($request->all());
            DB::commit();

            return new ArticuloResource($articulo->fresh()->load('categoria'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar artículo: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al actualizar el artículo'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Eliminar un artículo específico
     */
    public function destroy($id)
    {
        try {
            $articulo = Articulo::find($id);
            
            if (!$articulo) {
                return response()->json([
                    'message' => 'Artículo no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }

            DB::beginTransaction();
            $articulo->delete();
            DB::commit();

            return response()->json([
                'message' => 'Artículo eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar artículo: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar el artículo'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
