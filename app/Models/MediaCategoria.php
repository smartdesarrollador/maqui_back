<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaCategoria extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'media_categories';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
        'sort_order',
        'parent_id'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Obtiene la categoría padre
     */
    public function parent()
    {
        return $this->belongsTo(MediaCategoria::class, 'parent_id');
    }

    /**
     * Obtiene las subcategorías
     */
    public function children()
    {
        return $this->hasMany(MediaCategoria::class, 'parent_id');
    }

    /**
     * Obtiene los archivos multimedia de esta categoría
     */
    public function mediaFiles()
    {
        return $this->hasMany(MediaFile::class, 'category_id');
    }
}
