<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionAccesorio extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cotizaciones_accesorio';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cotizacion_accesorio';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'accesorio_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la cotización asociada
     */
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id', 'id_cotizacion');
    }

    /**
     * Obtiene el accesorio asociado
     */
    public function accesorio()
    {
        return $this->belongsTo(Accesorio::class, 'accesorio_id', 'id_accesorio');
    }
}
