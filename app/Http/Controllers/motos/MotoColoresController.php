<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\MotoColores;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MotoColoresController extends Controller
{
    /**
     * Obtiene todos los colores de motos.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $colores = MotoColores::all();
        return response()->json($colores);
    }

    /**
     * Obtiene un color de moto específico.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $color = MotoColores::findOrFail($id);
        return response()->json($color);
    }

    /**
     * Obtiene todos los colores disponibles para un modelo específico.
     *
     * @param int $modeloId
     * @return JsonResponse
     */
    public function getColoresPorModelo(int $modeloId): JsonResponse
    {
        $colores = MotoColores::where('modelo_id', $modeloId)->get();
        return response()->json($colores);
    }

    /**
     * Almacena un nuevo color de moto.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'modelo_id' => 'required|exists:modelos,id_modelo',
            'color' => 'required|string',
            'imagen_color' => 'required|string',
        ]);

        $color = MotoColores::create($request->all());
        return response()->json($color, 201);
    }

    /**
     * Actualiza un color de moto específico.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'modelo_id' => 'exists:modelos,id_modelo',
            'color' => 'string',
            'imagen_color' => 'string',
        ]);

        $color = MotoColores::findOrFail($id);
        $color->update($request->all());
        return response()->json($color);
    }

    /**
     * Elimina un color de moto específico.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $color = MotoColores::findOrFail($id);
        $color->delete();
        return response()->json(null, 204);
    }
} 