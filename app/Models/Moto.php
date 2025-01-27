<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'motos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_moto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'modelo_id',
        'tipo_moto_id',
        'año',
        'precio_base',
        'color',
        'stock',
        'descripcion',
        'imagen',
        'cilindrada',
        'motor',
        'potencia',
        'arranque',
        'transmision',
        'capacidad_tanque',
        'peso_neto',
        'carga_util',
        'peso_bruto',
        'largo',
        'ancho',
        'alto',
        'neumatico_delantero',
        'neumatico_posterior',
        'freno_delantero',
        'freno_posterior',
        'cargador_usb',
        'luz_led',
        'alarma',
        'cajuela',
        'tablero_led',
        'mp3',
        'bluetooth'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el modelo al que pertenece esta moto
     */
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id', 'id_modelo');
    }

    /**
     * Obtiene el tipo de moto
     */
    public function tipoMoto()
    {
        return $this->belongsTo(TipoMoto::class, 'tipo_moto_id', 'id_tipo_moto');
    }

    /**
     * Obtiene los accesorios relacionados a través de la tabla pivote
     */
    public function accesorios()
    {
        return $this->belongsToMany(Accesorio::class, 'accesorio_moto',
            'moto_id', 'accesorio_id',
            'id_moto', 'id_accesorio')
            ->withTimestamps();
    }

    /**
     * Obtiene los repuestos relacionados a través de la tabla pivote
     */
    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'repuesto_moto',
            'moto_id', 'repuesto_id',
            'id_moto', 'id_repuesto')
            ->withTimestamps();
    }

    /**
     * Obtiene las cotizaciones de esta moto
     */
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'moto_id', 'id_moto');
    }

    /**
     * Obtiene las reseñas de esta moto
     */
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'moto_id', 'id_moto');
    }
}
