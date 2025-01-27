<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'modelos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_modelo';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'marca_id',
        'nombre',
        'tipo',
        'cilindrada',
        'imagen'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la marca a la que pertenece este modelo
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id_marca');
    }

    /**
     * Obtiene todas las motos de este modelo
     */
    public function motos()
    {
        return $this->hasMany(Moto::class, 'modelo_id', 'id_modelo');
    }
}
