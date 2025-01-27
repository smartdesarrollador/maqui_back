<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRepuesto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'tipo_repuestos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_tipo_repuesto';

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
     * Obtiene los repuestos que pertenecen a este tipo
     */
    public function repuestos()
    {
        return $this->hasMany(Repuesto::class, 'tipo_repuesto_id', 'id_tipo_repuesto');
    }
}
