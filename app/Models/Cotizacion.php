<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cotizaciones';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cotizacion';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cliente_id',
        'moto_id',
        'precio_total',
        'estado'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el cliente asociado a la cotización
     */
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene la moto asociada a la cotización
     */
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id', 'id_moto');
    }

    /**
     * Obtiene los accesorios relacionados a través de la tabla pivote
     */
    public function accesorios()
    {
        return $this->belongsToMany(Accesorio::class, 'cotizaciones_accesorio',
            'cotizacion_id', 'accesorio_id',
            'id_cotizacion', 'id_accesorio')
            ->withTimestamps();
    }

    /**
     * Obtiene los repuestos relacionados a través de la tabla pivote
     */
    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'cotizacion_repuesto',
            'cotizacion_id', 'repuesto_id',
            'id_cotizacion', 'id_repuesto')
            ->withTimestamps();
    }

    /**
     * Obtiene el financiamiento asociado a la cotización
     */
    public function financiamiento()
    {
        return $this->hasOne(Financiamiento::class, 'cotizacion_id', 'id_cotizacion');
    }
}
