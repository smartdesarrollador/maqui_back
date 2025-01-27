<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClienteModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class clientesController extends Controller
{
    /**
     * Listar todos los clientes con sus relaciones y permitir búsqueda
     */
    public function index(Request $request)
    {
        try {
            // Validar parámetros de paginación y ordenamiento
            $validator = Validator::make($request->all(), [
                'per_page' => 'integer|min:1|max:100',
                'page' => 'integer|min:1',
                'order_by' => 'string|in:nombre,apellido,email,created_at',
                'order_direction' => 'string|in:asc,desc'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Parámetros de paginación inválidos',
                    'errors' => $validator->errors()
                ], 422);
            }

            $query = ClienteModel::with([
                'resenas.moto',
                'cotizaciones.moto',
                'motosResenadas',
                'motosCotizadas'
            ]);

            // Búsqueda por nombre o email
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('nombre', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('apellido', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('numero_documento', 'LIKE', "%{$searchTerm}%");
                });
            }

            // Filtros específicos
            if ($request->has('email')) {
                $query->where('email', $request->email);
            }

            if ($request->has('tipo_documento')) {
                $query->where('tipo_documento', $request->tipo_documento);
            }

            // Ordenamiento
            $orderBy = $request->get('order_by', 'nombre');
            $orderDirection = $request->get('order_direction', 'asc');
            $query->orderBy($orderBy, $orderDirection);

            // Paginación
            $perPage = $request->get('per_page', 2);
            $page = $request->get('page', 1);
            $clientes = $query->paginate($perPage, ['*'], 'page', $page);
            
            return response()->json([
                'success' => true,
                'message' => 'Clientes obtenidos exitosamente',
                'data' => [
                    'clientes' => $clientes->items(),
                    'pagination' => [
                        'total_items' => $clientes->total(),
                        'per_page' => $clientes->perPage(),
                        'current_page' => $clientes->currentPage(),
                        'last_page' => $clientes->lastPage(),
                        'from' => $clientes->firstItem(),
                        'to' => $clientes->lastItem(),
                        'previous_page' => $clientes->previousPageUrl(),
                        'next_page' => $clientes->nextPageUrl(),
                        'has_more_pages' => $clientes->hasMorePages(),
                    ],
                    'filters' => [
                        'search' => $request->search ?? null,
                        'email' => $request->email ?? null,
                        'tipo_documento' => $request->tipo_documento ?? null,
                        'order_by' => $orderBy,
                        'order_direction' => $orderDirection
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los clientes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un cliente específico
     */
    public function show($id)
    {
        try {
            $cliente = ClienteModel::with([
                'resenas.moto',
                'cotizaciones.moto',
                'motosResenadas',
                'motosCotizadas'
            ])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $cliente
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Crear un nuevo cliente
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:cliente,email',
                'telefono' => 'required|string|max:20',
                'tipo_usuario' => 'required|string',
                'tipo_documento' => 'required|string',
                'numero_documento' => 'required|string|unique:cliente,numero_documento',
                'fecha_nacimiento' => 'required|date',
                'departamento' => 'required|string',
                'provincia' => 'required|string',
                'distrito' => 'required|string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $datos = $request->all();

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $path = $imagen->storeAs('public/clientes', $nombreImagen);
                $datos['imagen'] = Storage::url($path);
            }

            $cliente = ClienteModel::create($datos);
            
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Cliente creado exitosamente',
                'data' => $cliente
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar un cliente existente
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cliente = ClienteModel::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nombre' => 'string|max:255',
                'apellido' => 'string|max:255',
                'email' => 'email|unique:cliente,email,' . $id . ',id_cliente',
                'telefono' => 'string|max:20',
                'tipo_usuario' => 'string',
                'tipo_documento' => 'string',
                'numero_documento' => 'string|unique:cliente,numero_documento,' . $id . ',id_cliente',
                'fecha_nacimiento' => 'date',
                'departamento' => 'string',
                'provincia' => 'string',
                'distrito' => 'string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $datos = $request->all();

            if ($request->hasFile('imagen')) {
                if ($cliente->imagen) {
                    Storage::delete(str_replace('/storage', 'public', $cliente->imagen));
                }
                
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $path = $imagen->storeAs('public/clientes', $nombreImagen);
                $datos['imagen'] = Storage::url($path);
            }

            $cliente->update($datos);
            
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Cliente actualizado exitosamente',
                'data' => $cliente->fresh(['resenas.moto', 'cotizaciones.moto'])
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un cliente
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $cliente = ClienteModel::findOrFail($id);

            if ($cliente->resenas()->exists() || $cliente->cotizaciones()->exists()) {
                throw new \Exception('No se puede eliminar el cliente porque tiene reseñas o cotizaciones asociadas');
            }

            if ($cliente->imagen) {
                Storage::delete(str_replace('/storage', 'public', $cliente->imagen));
            }

            $cliente->delete();
            
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Cliente eliminado exitosamente'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
