<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        // Obtener todos los comentarios
        $comments = Comment::with('post')->get();
        return CommentResource::collection($comments);
    }

    public function create()
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
    {
        // Validar los datos enviados
        $validator = Validator::make($request->all(), [
            'id_articulo' => 'required|exists:posts,id', // Verifica que el post relacionado existe
            'nombre_comentarista' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_comentario' => 'required|date', // Asegúrate de que es una fecha válida
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear el comentario
        $comment = Comment::create([
            'id_articulo' => $request->id_articulo,
            'nombre_comentarista' => $request->nombre_comentarista,
            'contenido' => $request->contenido,
            'fecha_comentario' => $request->fecha_comentario,
        ]);

        // Retornar el comentario recién creado usando el CommentResource
        return new CommentResource($comment);
    }

    public function show(Comment $comment)
    {
        // Retornar el comentario específico con su post relacionado
        return new CommentResource($comment->load('post'));
    }

    public function edit(Comment $comment)
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Comment $comment)
    {
        // Validar los datos enviados
        $validator = Validator::make($request->all(), [
            'id_articulo' => 'required|exists:posts,id', // Verifica que el post relacionado existe
            'nombre_comentarista' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_comentario' => 'required|date', // Asegúrate de que es una fecha válida
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar el comentario con los datos validados
        $comment->update([
            'id_articulo' => $request->id_articulo,
            'nombre_comentarista' => $request->nombre_comentarista,
            'contenido' => $request->contenido,
            'fecha_comentario' => $request->fecha_comentario,
        ]);

        // Retornar el comentario actualizado usando el CommentResource
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        // Eliminar el comentario
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
