<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesorioMoto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'accesorio_moto';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_accesorio_moto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'moto_id',
        'accesorio_id'
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
     * Obtiene el accesorio asociado
     */
    public function accesorio()
    {
        return $this->belongsTo(Accesorio::class, 'accesorio_id', 'id_accesorio');
    }
}
