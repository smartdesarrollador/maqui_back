<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financiamiento extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'financiamientos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_financiamiento';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'cliente_id',
        'monto_financiado',
        'plazo',
        'interes',
        'cuota_mensual',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'situacion_laboral',
        'cuota_inicial',
        'ingreso_mensual'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la cotización asociada al financiamiento
     */
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id', 'id_cotizacion');
    }

    /**
     * Obtiene el cliente asociado al financiamiento
     */
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente_id', 'id_cliente');
    }
}
