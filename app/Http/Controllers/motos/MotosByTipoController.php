<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\TipoMoto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;

class MotosByTipoController extends Controller
{
    /**
     * Lista las motos por tipo con búsqueda y paginación
     *
     * @param Request $request
     * @param string|null $tipoMoto
     * @return JsonResponse
     */
    public function index(Request $request, ?string $tipoMoto = null): JsonResponse
    {
        try {
            // Iniciar la consulta base
            $query = Moto::query()
                ->with(['modelo.marca', 'tipoMoto'])
                ->select('motos.*');

            // Filtrar por tipo de moto si se especifica
            if ($tipoMoto) {
                $query->whereHas('tipoMoto', function (Builder $query) use ($tipoMoto) {
                    $query->where('nombre', $tipoMoto);
                });
            }

            // Aplicar búsqueda si existe término
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function (Builder $query) use ($searchTerm) {
                    $query->whereHas('modelo', function (Builder $query) use ($searchTerm) {
                        $query->where('nombre', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('modelo.marca', function (Builder $query) use ($searchTerm) {
                        $query->where('nombre', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('cilindrada', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('motor', 'LIKE', "%{$searchTerm}%");
                });
            }

            // Aplicar ordenamiento
            $sortBy = $request->input('sort_by', 'created_at');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // Obtener resultados paginados
            $perPage = $request->input('per_page', 10);
            $motos = $query->paginate($perPage);

            return response()->json([
                'status' => 'success',
                'data' => $motos,
                'message' => 'Motos recuperadas exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al recuperar las motos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lista los tipos de moto disponibles
     *
     * @return JsonResponse
     */
    public function getTipos(): JsonResponse
    {
        try {
            $tipos = TipoMoto::select('id_tipo_moto', 'nombre', 'descripcion')
                ->withCount('motos')
                ->orderBy('nombre')
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $tipos,
                'message' => 'Tipos de moto recuperados exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al recuperar los tipos de moto: ' . $e->getMessage()
            ], 500);
        }
    }
}
