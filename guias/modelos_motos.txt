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

class ClienteModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cliente';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cliente';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'tipo_usuario',
        'tipo_documento',
        'numero_documento',
        'fecha_nacimiento',
        'departamento',
        'provincia',
        'distrito',
        'imagen'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene las reseñas del cliente
     */
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene las cotizaciones del cliente
     */
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene las motos a través de las reseñas
     */
    public function motosResenadas()
    {
        return $this->hasManyThrough(
            Moto::class,
            Resena::class,
            'cliente_id', // Clave foránea en reseñas
            'id_moto',    // Clave primaria en motos
            'id_cliente', // Clave primaria en clientes
            'moto_id'     // Clave foránea en reseñas
        );
    }

    /**
     * Obtiene las motos a través de las cotizaciones
     */
    public function motosCotizadas()
    {
        return $this->hasManyThrough(
            Moto::class,
            Cotizacion::class,
            'cliente_id',
            'id_moto',
            'id_cliente',
            'moto_id'
        );
    }
}

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

class CotizacionAccesorio extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cotizaciones_accesorio';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cotizacion_accesorio';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'accesorio_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la cotización asociada
     */
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id', 'id_cotizacion');
    }

    /**
     * Obtiene el accesorio asociado
     */
    public function accesorio()
    {
        return $this->belongsTo(Accesorio::class, 'accesorio_id', 'id_accesorio');
    }
}

class CotizacionRepuesto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cotizacion_repuesto';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cotizacion_repuesto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'repuesto_id'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la cotización asociada
     */
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id', 'id_cotizacion');
    }

    /**
     * Obtiene el repuesto asociado
     */
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'repuesto_id', 'id_repuesto');
    }
}

class Financiamiento extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'financiamientos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_financiamiento';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cotizacion_id',
        'cliente_id',
        'monto_financiado',
        'plazo',
        'interes',
        'cuota_mensual',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'situacion_laboral',
        'cuota_inicial',
        'ingreso_mensual'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene la cotización asociada al financiamiento
     */
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id', 'id_cotizacion');
    }

    /**
     * Obtiene el cliente asociado al financiamiento
     */
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente_id', 'id_cliente');
    }
}

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


class RepuestoMoto extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'repuesto_moto';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_repuesto_moto';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'moto_id',
        'repuesto_id'
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
     * Obtiene el repuesto asociado
     */
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'repuesto_id', 'id_repuesto');
    }
}

class Resena extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'resenas';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_resena';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cliente_id',
        'moto_id',
        'calificacion',
        'comentario'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el cliente que hizo la reseña
     */
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene la moto que fue reseñada
     */
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id', 'id_moto');
    }
}

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
