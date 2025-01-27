<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAccesorio extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'tipo_accesorios';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_tipo_accesorio';

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
     * Obtiene los accesorios que pertenecen a este tipo
     */
    public function accesorios()
    {
        return $this->hasMany(Accesorio::class, 'tipo_accesorio_id', 'id_tipo_accesorio');
    }
}
