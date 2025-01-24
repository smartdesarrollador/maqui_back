<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

  /*   public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories', 'id_categoria', 'id_post');
    } */

    public function posts()
{
    return $this->belongsToMany(Post::class, 'post_categories', 'id_categoria', 'id_post');
}
}
