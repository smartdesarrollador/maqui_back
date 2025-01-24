<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index()
    {
        // Obtener todas las etiquetas
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    public function create()
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear la etiqueta
        $tag = Tag::create([
            'nombre' => $request->nombre,
        ]);

        return new TagResource($tag);
    }

    public function show(Tag $tag)
    {
        // Mostrar una etiqueta específica
        return new TagResource($tag);
    }

    public function edit(Tag $tag)
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Tag $tag)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar la etiqueta
        $tag->update([
            'nombre' => $request->nombre ?? $tag->nombre,
        ]);

        return new TagResource($tag);
    }

    public function destroy(Tag $tag)
    {
        // Eliminar la etiqueta
        $tag->delete();

        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
