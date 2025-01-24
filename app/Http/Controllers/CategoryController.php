<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   public function index()
    {
        // Obtener todas las categorías
        $categories = Category::all();
        return CategoryResource::collection($categories);
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
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear la categoría
        $category = Category::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        // Retornar la categoría específica
        return new CategoryResource($category);
    }

    public function edit(Category $category)
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Category $category)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar los datos de la categoría
        $category->update($request->only(['nombre', 'descripcion']));

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        // Eliminar la categoría
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
