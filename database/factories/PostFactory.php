<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'contenido' => $this->faker->paragraphs(3, true),
            'id_autor' => 1, // Asumiendo que existe un usuario con ID 1
            'estado' => $this->faker->randomElement(['borrador', 'publicado', 'archivado']),
            'imagen' => $this->faker->optional()->imageUrl(),
            'ruta_imagen' => $this->faker->optional()->filePath(),
            'fecha_publicacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
