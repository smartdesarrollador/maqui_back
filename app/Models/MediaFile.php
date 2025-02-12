<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'title',
        'description',
        'alt_text',
        'is_public',
        'sort_order',
        'category_id',
        'uploaded_by'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'is_public' => 'boolean',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'integer',
        'file_size' => 'integer',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Obtiene la categoría a la que pertenece el archivo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(MediaCategory::class, 'category_id');
    }

    /**
     * Obtiene el usuario que subió el archivo
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
