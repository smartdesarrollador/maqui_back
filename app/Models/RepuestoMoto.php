<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepuestoMoto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'repuesto_moto';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_repuesto_moto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'moto_id',
        'repuesto_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la moto asociada
     */
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id', 'id_moto');
    }

    /**
     * Obtiene el repuesto asociado
     */
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'repuesto_id', 'id_repuesto');
    }
}
