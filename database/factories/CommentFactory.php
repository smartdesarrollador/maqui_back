<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'id_articulo' => Post::factory(),
            'nombre_comentarista' => $this->faker->name,
            'contenido' => $this->faker->paragraph,
            'fecha_comentario' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
