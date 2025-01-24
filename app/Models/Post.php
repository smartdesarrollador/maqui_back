<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'contenido', 'id_autor', 'estado', 'fecha_publicacion', 'imagen','ruta_imagen'];

    public function autor()
    {
        return $this->belongsTo(User::class, 'id_autor');
    }

    public function comentarios()
    {
        return $this->hasMany(Comment::class, 'id_articulo');
    }

   /*  public function categorias()
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'id_post', 'id_categoria');
    } */

    public function categorias()
{
    return $this->belongsToMany(Category::class, 'post_categories', 'id_post', 'id_categoria');
}


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'id_articulo', 'id_etiqueta');
    }
}
