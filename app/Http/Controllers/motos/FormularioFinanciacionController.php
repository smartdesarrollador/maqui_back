<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\ClienteModel;
use App\Models\Cotizacion;
use App\Models\Moto;
use App\Models\Financiamiento;
use App\Mail\FinanciamientoSolicitado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormularioFinanciacionController extends Controller
{
    /**
     * Guarda una nueva solicitud de financiamiento
     */
    public function store(Request $request): JsonResponse
    {
        try {
            Log::info('=== INICIANDO PROCESO DE SOLICITUD DE FINANCIAMIENTO ===');
            Log::info('Datos recibidos:', $request->all());
            
            // Validar los datos del formulario
            $validator = Validator::make($request->all(), [
                'tipo_moto_id' => 'required|integer',
                'modelo_id' => 'required|integer',
                'situacion_laboral' => 'required|string|in:dependiente,independiente,empresario',
                'ingreso_mensual' => 'required|numeric|min:0',
                'cuota_inicial' => 'required|numeric|min:0',
                'plazo' => 'required|integer|min:6|max:48',
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'celular' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'tipo_documento' => 'required|string|in:DNI,CE,PAS',
                'numero_documento' => 'required|string|max:20',
                'departamento' => 'required|string|max:100',
                'provincia' => 'required|string|max:100',
                'distrito' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            // 1. Buscar o crear el cliente
            $cliente = ClienteModel::where('email', $request->email)->first();
            
            if (!$cliente) {
                $cliente = ClienteModel::create([
                    'nombre' => $request->nombres,
                    'apellido' => $request->apellidos,
                    'telefono' => $request->celular,
                    'email' => $request->email,
                    'tipo_documento' => $request->tipo_documento,
                    'numero_documento' => $request->numero_documento,
                    'departamento' => $request->departamento,
                    'provincia' => $request->provincia,
                    'distrito' => $request->distrito,
                    'fecha_nacimiento' => $request->fecha_nacimiento
                ]);
                Log::info('Cliente creado:', ['id' => $cliente->id_cliente]);
            } else {
                Log::info('Cliente existente encontrado:', ['id' => $cliente->id_cliente]);
            }

            // 2. Buscar la moto
            $moto = Moto::where('modelo_id', $request->modelo_id)->first();
            if (!$moto) {
                throw new \Exception('Moto no encontrada');
            }
            Log::info('Moto encontrada:', ['id' => $moto->id_moto, 'precio' => $moto->precio_base]);

            // 3. Crear una cotización asociada
            $cotizacion = Cotizacion::create([
                'cliente_id' => $cliente->id_cliente,
                'moto_id' => $moto->id_moto,
                'precio_total' => $moto->precio_base,
                'estado' => 'solicitud_financiamiento'
            ]);
            Log::info('Cotización creada para financiamiento:', ['id' => $cotizacion->id_cotizacion]);

            // 4. Calcular datos de financiamiento
            $montoFinanciado = $moto->precio_base - $request->cuota_inicial;
            $interesMensual = 0.02; // 2% mensual (esto debería venir de configuración)
            $cuotaMensual = $this->calcularCuotaMensual($montoFinanciado, $interesMensual, $request->plazo);
            
            $fechaInicio = now();
            $fechaFin = now()->addMonths($request->plazo);

            // 5. Crear el registro de financiamiento
            $financiamiento = Financiamiento::create([
                'cotizacion_id' => $cotizacion->id_cotizacion,
                'cliente_id' => $cliente->id_cliente,
                'monto_financiado' => $montoFinanciado,
                'plazo' => $request->plazo,
                'interes' => $interesMensual * 100, // Guardar como porcentaje
                'cuota_mensual' => $cuotaMensual,
                'fecha_inicio' => $fechaInicio,
                'fecha_fin' => $fechaFin,
                'estado' => 'pendiente_evaluacion',
                'situacion_laboral' => $request->situacion_laboral,
                'cuota_inicial' => $request->cuota_inicial,
                'ingreso_mensual' => $request->ingreso_mensual
            ]);

            Log::info('Financiamiento creado:', ['id' => $financiamiento->id_financiamiento]);

            DB::commit();

            // Enviar correo de confirmación al cliente DESPUÉS del commit
            $emailEnviado = false;
            try {
                Mail::to($cliente->email)->send(new FinanciamientoSolicitado($cliente, $moto, $financiamiento));
                Log::info('Correo de financiamiento enviado exitosamente a: ' . $cliente->email);
                $emailEnviado = true;
            } catch (\Exception $mailException) {
                Log::error('Error al enviar correo de financiamiento: ' . $mailException->getMessage());
                $emailEnviado = false;
            }

            Log::info('=== PROCESO DE SOLICITUD DE FINANCIAMIENTO COMPLETADO EXITOSAMENTE ===');

            return response()->json([
                'status' => 'success',
                'message' => 'Solicitud de financiamiento enviada exitosamente' . ($emailEnviado ? ' y confirmación enviada por correo' : ''),
                'data' => [
                    'cliente_id' => $cliente->id_cliente,
                    'cotizacion_id' => $cotizacion->id_cotizacion,
                    'financiamiento_id' => $financiamiento->id_financiamiento,
                    'cuota_mensual' => $cuotaMensual,
                    'monto_financiado' => $montoFinanciado,
                    'email_enviado' => $emailEnviado
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en solicitud de financiamiento: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la solicitud de financiamiento: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calcula la cuota mensual usando la fórmula de anualidad
     */
    private function calcularCuotaMensual(float $monto, float $interesMensual, int $plazo): float
    {
        if ($interesMensual == 0) {
            return $monto / $plazo;
        }

        $cuota = $monto * ($interesMensual * pow(1 + $interesMensual, $plazo)) / 
                 (pow(1 + $interesMensual, $plazo) - 1);
        
        return round($cuota, 2);
    }
}