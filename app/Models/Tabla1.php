<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla1 extends Model
{
    use HasFactory;

    protected $table = 'tabla1';

    protected $fillable = [
        'varchar1',
        'varchar2',
        'varchar3',
        'varchar4',
        'varchar5',
        'varchar6',
        'varchar7',
        'decimal1',
        'decimal2',
        'decimal3',
        'text1',
        'text2',
        'text3',
        'boolean1',
        'date1',
        'time1',
        'categoria1_id',
    ];

    /**
     * Relación muchos a uno con Categoria1
     */
    public function categoria1()
    {
        return $this->belongsTo(Categoria1::class, 'categoria1_id');
    }

}
