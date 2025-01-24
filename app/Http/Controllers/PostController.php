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
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    try {
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
            $file = $request->file('imagen');
            $imageName = time() . '.' . $file->extension();
            
            // Ruta absoluta para el directorio de imágenes
            $uploadPath = '/home/enfocussol3/apikalmaperu.enfocussoluciones.pe/assets/imagen/post/';
            
            // Asegurarnos de que el directorio existe
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Mover el archivo
            if (!$file->move($uploadPath, $imageName)) {
                throw new \Exception('No se pudo guardar la imagen');
            }
            
            // Guardar la ruta relativa y el nombre de la imagen en el post
            $post->ruta_imagen = 'assets/imagen/post/' . $imageName;
            $post->imagen = $imageName;
            $post->save();
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

    } catch (\Exception $e) {
        // Si algo sale mal, eliminamos el post si se creó
        if (isset($post) && $post->exists) {
            // Eliminar la imagen si se subió
            if ($post->ruta_imagen) {
                $imagePath = '/home/enfocussol3/apikalmaperu.enfocussoluciones.pe/' . $post->ruta_imagen;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $post->delete();
        }

        return response()->json([
            'message' => 'Error al crear el post.',
            'error' => $e->getMessage()
        ], 500);
    }
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
        'id' => 'required|exists:posts,id',
        'titulo' => 'sometimes|required|string|max:255',
        'contenido' => 'sometimes|required|string',
        'id_autor' => 'sometimes|required|exists:users,id',
        'estado' => 'sometimes|required|in:publicado,borrador',
        'fecha_publicacion' => 'nullable|date',
        'categorias' => 'array',
        'categorias.*' => 'exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    try {
        // Buscar el post que se va a actualizar
        $post = Post::findOrFail($request->id);
        
        // Guardar la imagen anterior para posible rollback
        $oldImage = $post->imagen;
        $oldImagePath = $post->ruta_imagen;
        
        // Actualizar los campos del post
        $post->update($request->only([
            'titulo', 
            'contenido', 
            'id_autor', 
            'estado', 
            'fecha_publicacion'
        ]));

        // Manejar la actualización de la imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imageName = time() . '.' . $file->extension();
            
            // Ruta absoluta para el directorio de imágenes
            $uploadPath = '/home/enfocussol3/apikalmaperu.enfocussoluciones.pe/assets/imagen/post/';
            
            // Asegurarnos de que el directorio existe
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Intentar subir la nueva imagen
            if (!$file->move($uploadPath, $imageName)) {
                throw new \Exception('No se pudo guardar la nueva imagen');
            }

            // Si la subida fue exitosa, eliminar la imagen anterior
            if ($oldImage) {
                $oldImageFullPath = $uploadPath . $oldImage;
                if (file_exists($oldImageFullPath)) {
                    unlink($oldImageFullPath);
                }
            }

            // Actualizar las rutas en la base de datos
            $post->ruta_imagen = 'assets/imagen/post/' . $imageName;
            $post->imagen = $imageName;
            $post->save();
        }

        // Sincronizar categorías y etiquetas
        if ($request->has('categorias')) {
            $post->categorias()->sync($request->categorias);
        }

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return new PostResource($post);

    } catch (\Exception $e) {
        // Si algo sale mal y se subió una nueva imagen, intentar hacer rollback
        if (isset($imageName) && file_exists($uploadPath . $imageName)) {
            unlink($uploadPath . $imageName);
            
            // Restaurar los valores anteriores de la imagen
            $post->ruta_imagen = $oldImagePath;
            $post->imagen = $oldImage;
            $post->save();
        }

        return response()->json([
            'message' => 'Error al actualizar el post.',
            'error' => $e->getMessage()
        ], 500);
    }
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
