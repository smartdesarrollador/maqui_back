<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'accesorios';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_accesorio';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'tipo',
        'precio',
        'stock',
        'descripcion',
        'imagen',
        'tipo_accesorio_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el tipo de accesorio asociado
     */
    public function tipoAccesorio()
    {
        return $this->belongsTo(TipoAccesorio::class, 'tipo_accesorio_id', 'id_tipo_accesorio');
    }

    /**
     * Obtiene las motos relacionadas a través de la tabla pivote
     */
    public function motos()
    {
        return $this->belongsToMany(Moto::class, 'accesorio_moto', 
            'accesorio_id', 'moto_id', 
            'id_accesorio', 'id_moto')
            ->withTimestamps();
    }

    /**
     * Obtiene las cotizaciones relacionadas a través de la tabla pivote
     */
    public function cotizaciones()
    {
        return $this->belongsToMany(Cotizacion::class, 'cotizaciones_accesorio',
            'accesorio_id', 'cotizacion_id',
            'id_accesorio', 'id_cotizacion')
            ->withTimestamps();
    }
}
