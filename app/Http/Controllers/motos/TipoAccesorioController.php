<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\TipoAccesorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class TipoAccesorioController extends Controller
{
    /**
     * Obtener todos los tipos de accesorios
     */
    public function index(): JsonResponse
    {
        try {
            $tiposAccesorios = TipoAccesorio::with('accesorios')->get();
            
            return response()->json($tiposAccesorios, 200);
        } catch (Exception $e) {
            Log::error('Error al obtener tipos de accesorios: ' . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los tipos de accesorios',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear un nuevo tipo de accesorio
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:tipo_accesorios,nombre',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $tipoAccesorio = TipoAccesorio::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Tipo de accesorio creado exitosamente',
                'data' => $tipoAccesorio
            ], 201);
        } catch (Exception $e) {
            Log::error('Error al crear tipo de accesorio: ' . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el tipo de accesorio',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener un tipo de accesorio específico
     */
    public function show(int $id): JsonResponse
    {
        try {
            $tipoAccesorio = TipoAccesorio::with('accesorios')->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Tipo de accesorio obtenido exitosamente',
                'data' => $tipoAccesorio
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener tipo de accesorio: ' . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener el tipo de accesorio',
                'error' => $e->getMessage()
            ], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    /**
     * Actualizar un tipo de accesorio específico
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $tipoAccesorio = TipoAccesorio::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:tipo_accesorios,nombre,' . $id . ',id_tipo_accesorio',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $tipoAccesorio->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Tipo de accesorio actualizado exitosamente',
                'data' => $tipoAccesorio
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar tipo de accesorio: ' . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar el tipo de accesorio',
                'error' => $e->getMessage()
            ], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    /**
     * Eliminar un tipo de accesorio específico
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $tipoAccesorio = TipoAccesorio::findOrFail($id);

            // Verificar si tiene accesorios asociados
            if ($tipoAccesorio->accesorios()->count() > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No se puede eliminar el tipo de accesorio porque tiene accesorios asociados'
                ], 409);
            }

            $tipoAccesorio->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de accesorio eliminado exitosamente'
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar tipo de accesorio: ' . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar el tipo de accesorio',
                'error' => $e->getMessage()
            ], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }
}
