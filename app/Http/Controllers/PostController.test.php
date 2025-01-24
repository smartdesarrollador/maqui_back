<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public function index()
    {
        // Obtener todos los posts con las relaciones cargadas
        $posts = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->get();
        return PostResource::collection($posts);
    }

    public function create()
    {
        // Generalmente, en una API RESTful, esta función no se utiliza,
        // ya que la creación de un recurso suele manejarse en el frontend.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
{
    // Validar los datos recibidos
    $validator = Validator::make($request->all(), [
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
        'id_autor' => 'required|exists:users,id',
        'estado' => 'required|in:publicado,borrador',
        'fecha_publicacion' => 'nullable|date',
        'categorias' => 'array',
        'categorias.*' => 'exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validar que el archivo sea una imagen
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Crear el post con los datos recibidos
    $post = Post::create([
        'titulo' => $request->titulo,
        'contenido' => $request->contenido,
        'id_autor' => $request->id_autor,
        'estado' => $request->estado,
        'fecha_publicacion' => $request->fecha_publicacion,
    ]);

    // Subir y registrar la imagen si está presente
    if ($request->hasFile('imagen')) {
    // Subir la imagen
    $imageName = time() . '.' . $request->imagen->extension();
    $request->imagen->move(public_path('assets/imagen/post/'), $imageName);

    // Guardar la ruta relativa en el post
    $post->ruta_imagen = 'assets/imagen/post/' . $imageName; // Guardar solo la ruta relativa
    $post->imagen = $imageName; // Nombre del archivo de imagen
    $post->save(); // Guardar los cambios
}


    // Sincronizar las categorías y etiquetas si están presentes
    if ($request->has('categorias')) {
        $post->categorias()->sync($request->categorias);
    }

    if ($request->has('tags')) {
        $post->tags()->sync($request->tags);
    }

    // Devolver el recurso Post con las relaciones cargadas
    return new PostResource($post->load('categorias', 'tags', 'autor'));
}



    public function show($id)
    {
        // Obtener un post específico con las relaciones cargadas
        $post = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->findOrFail($id);
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        // Similar a `create`, este método generalmente no se utiliza en una API RESTful,
        // ya que la edición de un recurso suele manejarse en el frontend.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Post $post)
{
     dd($request->all());
    // Validar los datos recibidos
    $validator = Validator::make($request->all(), [
        'titulo' => 'sometimes|required|string|max:255',
        'contenido' => 'sometimes|required|string',
        'id_autor' => 'sometimes|required|exists:users,id',
        'estado' => 'sometimes|required|in:publicado,borrador',
        'fecha_publicacion' => 'nullable|date',
        'categorias' => 'array',
        'categorias.*' => 'exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validar imagen si está presente
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Actualizar los campos del post si están presentes en el request
    $post->update($request->only(['titulo', 'contenido', 'id_autor', 'estado', 'fecha_publicacion']));

    // Lógica para actualizar la imagen
    if ($request->hasFile('imagen')) {
        // Borrar la imagen anterior si existe
        if ($post->imagen) {
            $oldImagePath = public_path('assets/imagen/post/' . $post->imagen);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Eliminar el archivo de la imagen anterior
            }
        }

        // Subir la nueva imagen
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('assets/imagen/post/'), $imageName);

        // Actualizar la ruta de la imagen en el post
        $post->ruta_imagen = '/assets/imagen/post/' . $imageName;
        $post->imagen = $imageName;
        $post->save(); // Guardar los cambios
    }

    // Sincronizar categorías y etiquetas si están presentes
    if ($request->has('categorias')) {
        $post->categorias()->sync($request->categorias);
    }

    if ($request->has('tags')) {
        $post->tags()->sync($request->tags);
    }

    return new PostResource($post);
}


    public function destroy(Post $post)
    {
        // Eliminar el post y sus relaciones con categorías y etiquetas
        $post->categorias()->detach();
        $post->tags()->detach();
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function updateWithPost(Request $request)
{
    // Validar los datos recibidos
    $validator = Validator::make($request->all(), [
        'id' => 'required|exists:posts,id', // Necesitamos el ID del post a actualizar
        'titulo' => 'sometimes|required|string|max:255',
        'contenido' => 'sometimes|required|string',
        'id_autor' => 'sometimes|required|exists:users,id',
        'estado' => 'sometimes|required|in:publicado,borrador',
        'fecha_publicacion' => 'nullable|date',
        'categorias' => 'array',
        'categorias.*' => 'exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validar la imagen
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Buscar el post que se va a actualizar
    $post = Post::findOrFail($request->id);

    // Actualizar los campos del post si están presentes en el request
    $post->update($request->only(['titulo', 'contenido', 'id_autor', 'estado', 'fecha_publicacion']));

    // Lógica para actualizar la imagen
    if ($request->hasFile('imagen')) {
        // Borrar la imagen anterior si existe
        if ($post->imagen) {
            $oldImagePath = public_path('assets/imagen/post/' . $post->imagen);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Eliminar el archivo de la imagen anterior
            }
        }

        // Subir la nueva imagen
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('assets/imagen/post/'), $imageName);

        // Actualizar la ruta de la imagen en el post
        $post->ruta_imagen = 'assets/imagen/post/' . $imageName;
        $post->imagen = $imageName;
        $post->save(); // Guardar los cambios
    }

    // Sincronizar categorías y etiquetas si están presentes
    if ($request->has('categorias')) {
        $post->categorias()->sync($request->categorias);
    }

    if ($request->has('tags')) {
        $post->tags()->sync($request->tags);
    }

    return new PostResource($post);
}

public function getPostsByCategory($categoryId)
{
    // Obtener posts que están relacionados con la categoría a través de la tabla pivote
    $posts = Post::whereHas('categorias', function ($query) use ($categoryId) {
        $query->where('categories.id', $categoryId);
    })->with(['autor', 'categorias', 'tags'])->get();

    // Retornar los posts relacionados con la categoría en un formato de JSON
    return PostResource::collection($posts);
}


}
