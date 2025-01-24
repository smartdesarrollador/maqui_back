<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria1 extends Model
{
    use HasFactory;

    protected $table = 'categoria1';

    protected $fillable = [
        'varchar1',
        'varchar2',
        'varchar3',
        'text1',
        'boolean1',
        'date1',
        'time1',
    ];

    /**
     * Relación uno a muchos con Tabla1
     */
    public function tabla1()
    {
        return $this->hasMany(Tabla1::class, 'categoria1_id');
    }
}
