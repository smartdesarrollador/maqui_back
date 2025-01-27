<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionRepuesto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cotizacion_repuesto';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cotizacion_repuesto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'repuesto_id'
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
     * Obtiene el repuesto asociado
     */
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'repuesto_id', 'id_repuesto');
    }
}
