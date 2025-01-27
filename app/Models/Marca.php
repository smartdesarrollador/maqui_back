<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'marcas';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_marca';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'origen',
        'fundacion',
        'logo'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene los modelos asociados a esta marca
     */
    public function modelos()
    {
        return $this->hasMany(Modelo::class, 'marca_id', 'id_marca');
    }

    /**
     * Obtiene todas las motos de esta marca a través de los modelos
     */
    public function motos()
    {
        return $this->hasManyThrough(
            Moto::class,
            Modelo::class,
            'marca_id', // Clave foránea en modelos
            'modelo_id', // Clave foránea en motos
            'id_marca',  // Clave local en marcas
            'id_modelo'  // Clave local en modelos
        );
    }
}
