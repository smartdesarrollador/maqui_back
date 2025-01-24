<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Comment;


class PostCommentRelationshipTest extends TestCase
{
   

    public function test_post_has_many_comments()
    {
        // Obtener el primer post que tenga comentarios
        $post = Post::has('comentarios')->first();

        // Verificar que el post existe y tiene comentarios asociados
        $this->assertNotNull($post, 'No se encontró ningún post con comentarios.');
        $this->assertGreaterThan(0, $post->comentarios->count());
        $this->assertInstanceOf(Comment::class, $post->comentarios->first());
    }

    public function test_comment_belongs_to_post()
    {
        // Obtener el primer comentario que tenga un post asociado
        $comment = Comment::has('post')->first();

        // Verificar que el comentario existe y pertenece a un post
        $this->assertNotNull($comment, 'No se encontró ningún comentario con un post asociado.');
        $this->assertNotNull($comment->post);
        $this->assertInstanceOf(Post::class, $comment->post);
    }
}
