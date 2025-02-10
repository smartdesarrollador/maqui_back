<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\TipoRepuesto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class TipoRepuestoController extends Controller
{
    /**
     * Obtener todos los tipos de repuestos
     */
    public function index(): JsonResponse
    {
        try {
            $tiposRepuesto = TipoRepuesto::orderBy('nombre')->get();
            
            return response()->json([
                'status' => true,
                'message' => 'Tipos de repuesto obtenidos exitosamente',
                'data' => $tiposRepuesto
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener tipos de repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los tipos de repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacenar un nuevo tipo de repuesto
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:tipo_repuestos,nombre',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $tipoRepuesto = TipoRepuesto::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Tipo de repuesto creado exitosamente',
                'data' => $tipoRepuesto
            ], 201);
        } catch (Exception $e) {
            Log::error('Error al crear tipo de repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el tipo de repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un tipo de repuesto específico
     */
    public function show(int $id): JsonResponse
    {
        try {
            $tipoRepuesto = TipoRepuesto::with('repuestos')->findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Tipo de repuesto obtenido exitosamente',
                'data' => $tipoRepuesto
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al obtener tipo de repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener el tipo de repuesto',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar un tipo de repuesto específico
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $tipoRepuesto = TipoRepuesto::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:tipo_repuestos,nombre,' . $id . ',id_tipo_repuesto',
                'descripcion' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $tipoRepuesto->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Tipo de repuesto actualizado exitosamente',
                'data' => $tipoRepuesto
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al actualizar tipo de repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar el tipo de repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un tipo de repuesto específico
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $tipoRepuesto = TipoRepuesto::findOrFail($id);

            // Verificar si hay repuestos asociados
            if ($tipoRepuesto->repuestos()->count() > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No se puede eliminar el tipo de repuesto porque tiene repuestos asociados'
                ], 400);
            }

            $tipoRepuesto->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de repuesto eliminado exitosamente'
            ], 200);
        } catch (Exception $e) {
            Log::error('Error al eliminar tipo de repuesto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar el tipo de repuesto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
