<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria1;
use App\Http\Resources\Categoria1Resource;

class Categoria1Controller extends Controller
{
    public function index()
    {
        return Categoria1Resource::collection(Categoria1::all());
    }

    public function store(Request $request) 
{
    $data = $request->validate([
        'varchar1' => 'nullable|string|max:250',
        'varchar2' => 'nullable|string|max:250',
        'varchar3' => 'nullable|image|mimes:jpg,png|max:2048', // Validación para imagen jpg o png
        'text1' => 'nullable|string',
        'boolean1' => 'nullable|boolean',
        'date1' => 'nullable|date',
        'time1' => 'nullable',
    ]);

    // Si se sube una imagen, la guardamos en la carpeta 'public' y almacenamos el nombre del archivo
    if ($request->hasFile('varchar3')) {
        $file = $request->file('varchar3');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/imagen/categoria1'), $filename);
        $data['varchar3'] = 'assets/imagen/categoria1/' . $filename; // Guardamos la ruta relativa
    }

    $categoria1 = Categoria1::create($data);

    // Devolver el recurso con mensaje y código de estado 201
    return response()->json([
        'message' => 'Registro creado satisfactoriamente',
        'data' => new Categoria1Resource($categoria1)
    ], 201);
}



    public function show(Categoria1 $categoria1)
    {
        return new Categoria1Resource($categoria1);
    }

    public function update(Request $request, Categoria1 $categoria1)
    {
        $data = $request->validate([
            'varchar1' => 'nullable|string|max:250',
            'varchar2' => 'nullable|string|max:250',
            'varchar3' => 'nullable|string|max:250',
            'text1' => 'nullable|string',
            'boolean1' => 'nullable|boolean',
            'date1' => 'nullable|date',
            'time1' => 'nullable',
        ]);

        $categoria1->update($data);

        return new Categoria1Resource($categoria1);
    }

    public function destroy(Categoria1 $categoria1)
{
    $categoria1->delete();

    return response()->json([
        'message' => 'Registro eliminado satisfactoriamente.',
    ], 200);
}


    public function updateWithPost(Request $request, $id)
{
    $data = $request->validate([
        'varchar1' => 'nullable|string|max:250',
        'varchar2' => 'nullable|string|max:250',
        'varchar3' => 'nullable|image|mimes:jpg,png|max:2048', // Validación para imagen jpg o png
        'text1' => 'nullable|string',
        'boolean1' => 'nullable|boolean',
        'date1' => 'nullable|date',
        'time1' => 'nullable',
    ]);

    $categoria1 = Categoria1::findOrFail($id);

    // Si se sube una nueva imagen, la guardamos en la carpeta 'public' y actualizamos el nombre del archivo
    if ($request->hasFile('varchar3')) {
        $file = $request->file('varchar3');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/imagen/categoria1'), $filename);
        $data['varchar3'] = 'assets/imagen/categoria1/' . $filename; // Guardamos la ruta relativa

        // Opción para eliminar la imagen antigua si existe
        if ($categoria1->varchar3 && file_exists(public_path($categoria1->varchar3))) {
            unlink(public_path($categoria1->varchar3));
        }
    }

    $categoria1->update($data);

    return response()->json([
        'message' => 'Registro actualizado satisfactoriamente.',
        'data' => new Categoria1Resource($categoria1),
    ], 200);
}

public function getCategoriasConRegistros()
    {
        // Obtener todas las categorías con sus registros de tabla1
        $categorias = Categoria1::with('tabla1')->get();

        // Retornar las categorías usando el recurso
        return response()->json(Categoria1Resource::collection($categorias), 200);
    }
}
