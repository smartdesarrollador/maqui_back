<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mision extends Model
{
    use HasFactory;

    protected $table = 'mision';

    protected $primaryKey = 'id_mision';

    protected $fillable = ['imagen_mision', 'url_imagen_mision','titulo_mision','contenido_mision','contenido_vision','contenido_valores'];
}
