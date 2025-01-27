<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'repuestos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_repuesto';

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
        'tipo_repuesto_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el tipo de repuesto asociado
     */
    public function tipoRepuesto()
    {
        return $this->belongsTo(TipoRepuesto::class, 'tipo_repuesto_id', 'id_tipo_repuesto');
    }

    /**
     * Obtiene las motos relacionadas a través de la tabla pivote
     */
    public function motos()
    {
        return $this->belongsToMany(Moto::class, 'repuesto_moto',
            'repuesto_id', 'moto_id',
            'id_repuesto', 'id_moto')
            ->withTimestamps();
    }

    /**
     * Obtiene las cotizaciones relacionadas a través de la tabla pivote
     */
    public function cotizaciones()
    {
        return $this->belongsToMany(Cotizacion::class, 'cotizacion_repuesto',
            'repuesto_id', 'cotizacion_id',
            'id_repuesto', 'id_cotizacion')
            ->withTimestamps();
    }
}
