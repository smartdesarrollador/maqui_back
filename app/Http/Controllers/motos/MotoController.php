<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MotoController extends Controller
{
    /**
     * Obtener listado de motos con paginación
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            // Validar parámetros de paginación y ordenamiento
            $validator = Validator::make($request->all(), [
                'per_page' => 'integer|min:1|max:100',
                'page' => 'integer|min:1',
                'order_by' => 'string|in:año,precio_base,created_at',
                'order_direction' => 'string|in:asc,desc'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            // Construir la consulta base
            $query = Moto::with(['modelo.marca', 'tipoMoto']);

            // Aplicar búsqueda si existe término
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('color', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('cilindrada', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('motor', 'LIKE', "%{$searchTerm}%")
                      ->orWhereHas('modelo', function($q) use ($searchTerm) {
                          $q->where('nombre', 'LIKE', "%{$searchTerm}%");
                      })
                      ->orWhereHas('modelo.marca', function($q) use ($searchTerm) {
                          $q->where('nombre', 'LIKE', "%{$searchTerm}%");
                      });
                });
            }

            // Aplicar filtros adicionales
            if ($request->has('año')) {
                $query->where('año', $request->año);
            }

            if ($request->has('precio_min')) {
                $query->where('precio_base', '>=', $request->precio_min);
            }

            if ($request->has('precio_max')) {
                $query->where('precio_base', '<=', $request->precio_max);
            }

            if ($request->has('tipo_moto_id')) {
                $query->where('tipo_moto_id', $request->tipo_moto_id);
            }

            // Aplicar ordenamiento
            $orderBy = $request->get('order_by', 'created_at');
            $orderDirection = $request->get('order_direction', 'desc');
            $query->orderBy($orderBy, $orderDirection);

            // Ejecutar paginación
            $motos = $query->paginate($request->get('per_page', 10));

            return response()->json($motos, 200);

        } catch (\Exception $e) {
            Log::error('Error al obtener motos: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacenar una nueva moto
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Log::info('Recibiendo request para crear moto:', $request->all());
            
            $validator = Validator::make($request->all(), [
                'modelo_id' => 'required|exists:modelos,id_modelo',
                'tipo_moto_id' => 'required|exists:tipo_motos,id_tipo_moto',
                'año' => 'required|integer|min:1900',
                'precio_base' => 'required|numeric|min:0',
                'color' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'descripcion' => 'required|string',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cilindrada' => 'required|string|max:255',
                'motor' => 'required|string|max:255',
                'potencia' => 'required|string|max:255',
                'arranque' => 'required|string|max:255',
                'transmision' => 'required|string|max:255',
                'capacidad_tanque' => 'required|regex:/^\d*\.?\d+$/|max:255',
                'peso_neto' => 'required|numeric|min:0',
                'carga_util' => 'required|numeric|min:0',
                'peso_bruto' => 'required|numeric|min:0',
                'largo' => 'required|numeric|min:0',
                'ancho' => 'required|numeric|min:0',
                'alto' => 'required|numeric|min:0',
                'neumatico_delantero' => 'required|string|max:255',
                'neumatico_posterior' => 'required|string|max:255',
                'freno_delantero' => 'required|string|max:255',
                'freno_posterior' => 'required|string|max:255',
                'cargador_usb' => 'boolean',
                'luz_led' => 'boolean',
                'alarma' => 'boolean',
                'bluetooth' => 'boolean'
            ]);

            if ($validator->fails()) {
                Log::error('Validación fallida:', $validator->errors()->toArray());
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Asegurarse de que los campos booleanos se conviertan a 0 o 1
            $data = $request->all();
            $booleanFields = ['cargador_usb', 'luz_led', 'alarma', 'bluetooth'];
            foreach ($booleanFields as $field) {
                $data[$field] = isset($data[$field]) && $data[$field] ? 1 : 0;
            }

            DB::beginTransaction();
            
            if ($request->hasFile('imagen')) {
                Log::info('Procesando imagen:', [
                    'nombre_original' => $request->file('imagen')->getClientOriginalName(),
                    'mime_type' => $request->file('imagen')->getMimeType(),
                    'tamaño' => $request->file('imagen')->getSize()
                ]);
                $image = $request->file('imagen');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Crear el directorio si no existe
                $path = public_path('assets/motos');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                
                // Mover la imagen al directorio
                $image->move($path, $imageName);
                
                // Guardar la ruta relativa en la base de datos
                $data['imagen'] = 'assets/motos/' . $imageName;
            } else {
                Log::error('No se encontró archivo de imagen en la request');
            }
            
            $moto = Moto::create($data);
            
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto creada exitosamente',
                'data' => $moto
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear moto:', [
                'mensaje' => $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una moto específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $moto = Moto::with([
                'modelo.marca', 
                'tipoMoto',
                'accesorios',
                'repuestos'
            ])->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Moto obtenida exitosamente',
                'data' => $moto
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al obtener moto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener la moto',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar una moto específica
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            Log::info('Recibiendo request para actualizar moto:', $request->all());

            $validator = Validator::make($request->all(), [
                'modelo_id' => 'exists:modelos,id_modelo',
                'tipo_moto_id' => 'exists:tipo_motos,id_tipo_moto',
                'año' => 'integer',
                'precio_base' => 'numeric',
                'color' => 'string',
                'stock' => 'integer',
                'descripcion' => 'string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cilindrada' => 'string',
                'motor' => 'string',
                'potencia' => 'string',
                'arranque' => 'string',
                'transmision' => 'string',
                'capacidad_tanque' => 'regex:/^\d*\.?\d+$/',
                'peso_neto' => 'numeric',
                'carga_util' => 'numeric',
                'peso_bruto' => 'numeric',
                'largo' => 'numeric',
                'ancho' => 'numeric',
                'alto' => 'numeric',
                'neumatico_delantero' => 'string',
                'neumatico_posterior' => 'string',
                'freno_delantero' => 'string',
                'freno_posterior' => 'string',
                'cargador_usb' => 'boolean',
                'luz_led' => 'boolean',
                'alarma' => 'boolean',
                'bluetooth' => 'boolean'
            ]);

            if ($validator->fails()) {
                Log::error('Validación fallida:', $validator->errors()->toArray());
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $moto = Moto::findOrFail($id);
            $data = $request->all();

            // Convertir campos booleanos
            $booleanFields = ['cargador_usb', 'luz_led', 'alarma', 'bluetooth'];
            foreach ($booleanFields as $field) {
                if (isset($data[$field])) {
                    $data[$field] = filter_var($data[$field], FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
                }
            }

            // Procesar la imagen si se proporciona una nueva
            if ($request->hasFile('imagen')) {
                Log::info('Procesando nueva imagen:', [
                    'nombre_original' => $request->file('imagen')->getClientOriginalName(),
                    'mime_type' => $request->file('imagen')->getMimeType(),
                    'tamaño' => $request->file('imagen')->getSize()
                ]);

                $image = $request->file('imagen');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Crear el directorio si no existe
                $path = public_path('assets/motos');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                
                // Eliminar la imagen anterior si existe
                if ($moto->imagen && file_exists(public_path($moto->imagen))) {
                    unlink(public_path($moto->imagen));
                }
                
                // Mover la nueva imagen al directorio
                $image->move($path, $imageName);
                
                // Actualizar la ruta de la imagen en los datos
                $data['imagen'] = 'assets/motos/' . $imageName;
            }

            $moto->update($data);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto actualizada exitosamente',
                'data' => $moto
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar moto:', [
                'mensaje' => $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar una moto específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $moto = Moto::findOrFail($id);
            $moto->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto eliminada exitosamente'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar moto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
