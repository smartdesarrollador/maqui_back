<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMoto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'tipo_motos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_tipo_moto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene las motos que pertenecen a este tipo
     */
    public function motos()
    {
        return $this->hasMany(Moto::class, 'tipo_moto_id', 'id_tipo_moto');
    }
}
