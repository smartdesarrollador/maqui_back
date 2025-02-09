<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AccesorioController extends Controller
{
    /**
     * Obtener listado de accesorios
     */
    public function index(Request $request)
    {
        try {
            $query = Accesorio::with(['tipoAccesorio', 'motos']);

            // Aplicar filtros
            if ($request->has('nombre')) {
                $query->where('nombre', 'like', '%' . $request->nombre . '%');
            }

            // Búsqueda por tipo
            if ($request->has('tipo')) {
                $query->where('tipo', 'like', '%' . $request->tipo . '%');
            }

            // Búsqueda por rango de precios
            if ($request->has('precio_min')) {
                $query->where('precio', '>=', $request->precio_min);
            }
            if ($request->has('precio_max')) {
                $query->where('precio', '<=', $request->precio_max);
            }

            // Búsqueda por tipo de accesorio
            if ($request->has('tipo_accesorio_id')) {
                $query->where('tipo_accesorio_id', $request->tipo_accesorio_id);
            }

            // Ordenamiento
            $sortBy = $request->get('sort_by', 'nombre');
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);

            // Paginación
            $perPage = $request->get('per_page', 10);
            $accesorios = $query->paginate($perPage);

            // Log para debugging
            Log::info('Accesorios query result:', [
                'total' => $accesorios->total(),
                'per_page' => $accesorios->perPage(),
                'current_page' => $accesorios->currentPage(),
                'data' => $accesorios->items()
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Accesorios obtenidos exitosamente',
                'data' => $accesorios->items(),
                'meta' => [
                    'total' => $accesorios->total(),
                    'current_page' => $accesorios->currentPage(),
                    'per_page' => $accesorios->perPage(),
                    'last_page' => $accesorios->lastPage()
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error en AccesorioController@index: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener accesorios',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacenar un nuevo accesorio
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'tipo' => 'required|string|max:100',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'descripcion' => 'required|string',
                'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tipo_accesorio_id' => 'required|exists:tipo_accesorios,id_tipo_accesorio'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Procesar y guardar la imagen
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = 'accesorios/' . Str::random(20) . '.' . $imagen->getClientOriginalExtension();
                $rutaCompleta = public_path('storage/' . $nombreImagen);
                
                // Asegurarse que el directorio existe
                if (!file_exists(public_path('assets/imagen/accesorios'))) {
                    mkdir(public_path('assets/imagen/accesorios'), 0777, true);
                }
                

                // Mover la imagen al directorio público
                $imagen->move(public_path('assets/imagen/accesorios'), basename($nombreImagen));

            }

            $accesorio = Accesorio::create([
                'nombre' => $request->nombre,
                'tipo' => $request->tipo,
                'precio' => $request->precio,
                'stock' => $request->stock,
                'descripcion' => $request->descripcion,
                'imagen' => $nombreImagen ?? null,
                'tipo_accesorio_id' => $request->tipo_accesorio_id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Accesorio creado exitosamente',
                'data' => $accesorio
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear accesorio',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un accesorio específico
     */
    public function show($id)
    {
        try {
            $accesorio = Accesorio::with(['tipoAccesorio', 'motos'])
                ->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Accesorio obtenido exitosamente',
                'data' => $accesorio
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener accesorio',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar un accesorio específico
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'string|max:255',
                'tipo' => 'string|max:100', 
                'precio' => 'numeric|min:0',
                'stock' => 'integer|min:0',
                'descripcion' => 'string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'tipo_accesorio_id' => 'exists:tipo_accesorios,id_tipo_accesorio'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $accesorio = Accesorio::findOrFail($id);

            // Procesar y actualizar la imagen si se proporciona una nueva
            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($accesorio->imagen) {
                    $rutaImagenAnterior = public_path('assets/imagen/accesorios/' . $accesorio->imagen);
                    if (file_exists($rutaImagenAnterior)) {
                        unlink($rutaImagenAnterior);
                    }
                }

                
                $imagen = $request->file('imagen');
                $nombreImagen = 'accesorios/' . Str::random(20) . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = public_path('assets/imagen/accesorios/' . $nombreImagen);
                

                // Asegurar que el directorio existe
                $directorioAccesorios = public_path('assets/imagen/accesorios');
                if (!file_exists($directorioAccesorios)) {
                    mkdir($directorioAccesorios, 0777, true);
                }

                
                // Mover la imagen al directorio
                $imagen->move(public_path('assets/imagen/accesorios'), basename($nombreImagen));
                

                $request->merge(['imagen' => $nombreImagen]);
            }

            // Obtener los datos del formulario
            $datosActualizados = $request->except(['_method']);
            
            $accesorio->update($datosActualizados);

            return response()->json([
                'status' => true,
                'message' => 'Accesorio actualizado exitosamente',
                'data' => $accesorio
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar accesorio',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un accesorio específico
     */
    public function destroy($id)
    {
        try {
            $accesorio = Accesorio::findOrFail($id);

            // Eliminar imagen si existe
            if ($accesorio->imagen) {
                Storage::disk('public')->delete($accesorio->imagen);
            }

            $accesorio->delete();

            return response()->json([
                'status' => true,
                'message' => 'Accesorio eliminado exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar accesorio',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
