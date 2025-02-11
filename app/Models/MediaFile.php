<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'media_files';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'mime_type',
        'extension',
        'width',
        'height',
        'duration',
        'description',
        'alt_text',
        'title',
        'is_public',
        'sort_order',
        'category_id',
        'uploaded_by'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'file_size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'float',
        'is_public' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Obtiene la categoría a la que pertenece el archivo
     */
    public function category()
    {
        return $this->belongsTo(MediaCategoria::class, 'category_id');
    }

    /**
     * Obtiene el usuario que subió el archivo
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
