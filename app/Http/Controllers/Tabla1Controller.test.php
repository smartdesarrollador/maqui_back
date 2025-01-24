<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla1;
use App\Http\Resources\Tabla1Resource;
use Illuminate\Support\Facades\DB;

class Tabla1Controller extends Controller
{
   public function index()
    {
        return Tabla1Resource::collection(Tabla1::with('categoria1')->get());
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'varchar1' => 'nullable|string|max:250',
        'varchar2' => 'nullable|string|max:250',
        'varchar3' => 'nullable|string|max:250',
        'varchar4' => 'nullable|string|max:250',
        'varchar5' => 'nullable|string|max:250',
        'varchar6' => 'nullable|string|max:250',
        'varchar7' => 'nullable|image|mimes:jpg,png|max:2048', // Validación para imagen jpg o png
        'decimal1' => 'nullable|numeric',
        'decimal2' => 'nullable|numeric',
        'decimal3' => 'nullable|numeric',
        'text1' => 'nullable|string',
        'text2' => 'nullable|string',
        'text3' => 'nullable|string',
        'boolean1' => 'nullable|boolean',
        'date1' => 'nullable|date',
        'time1' => 'nullable',
        'categoria1_id' => 'nullable|exists:categoria1,id',
    ]);

    // Si se sube una imagen, la guardamos en la carpeta 'public' y almacenamos el nombre del archivo
    if ($request->hasFile('varchar7')) {
        $file = $request->file('varchar7');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/imagen/tabla1'), $filename);
        $data['varchar7'] = 'assets/imagen/tabla1/' . $filename; // Guardamos la ruta relativa
    }

    $tabla1 = Tabla1::create($data);

    return response()->json([
        'message' => 'Registro creado satisfactoriamente.',
        'data' => new Tabla1Resource($tabla1),
    ], 201);
}



    public function show(Tabla1 $tabla1)
    {
        return new Tabla1Resource($tabla1->load('categoria1'));
    }

    public function update(Request $request, Tabla1 $tabla1)
    {
        $data = $request->validate([
            'varchar1' => 'nullable|string|max:250',
            'varchar2' => 'nullable|string|max:250',
            'varchar3' => 'nullable|string|max:250',
            'varchar4' => 'nullable|string|max:250',
            'varchar5' => 'nullable|string|max:250',
            'varchar6' => 'nullable|string|max:250',
            'varchar7' => 'nullable|string|max:250',
            'decimal1' => 'nullable|numeric',
            'decimal2' => 'nullable|numeric',
            'decimal3' => 'nullable|numeric',
            'text1' => 'nullable|string',
            'text2' => 'nullable|string',
            'text3' => 'nullable|string',
            'boolean1' => 'nullable|boolean',
            'date1' => 'nullable|date',
            'time1' => 'nullable',
            'categoria1_id' => 'nullable|exists:categoria1,id',
        ]);

        $tabla1->update($data);

        return new Tabla1Resource($tabla1);
    }

    public function destroy(Tabla1 $tabla1)
{
    $tabla1->delete();

    return response()->json([
        'message' => 'Registro eliminado satisfactoriamente.',
    ], 200);
}


    public function updateWithPost(Request $request, $id)
{
    $data = $request->validate([
        'varchar1' => 'nullable|string|max:250',
        'varchar2' => 'nullable|string|max:250',
        'varchar3' => 'nullable|string|max:250',
        'varchar4' => 'nullable|string|max:250',
        'varchar5' => 'nullable|string|max:250',
        'varchar6' => 'nullable|string|max:250',
        'varchar7' => 'nullable|image|mimes:jpg,png|max:2048', // Validación para imagen jpg o png
        'decimal1' => 'nullable|numeric',
        'decimal2' => 'nullable|numeric',
        'decimal3' => 'nullable|numeric',
        'text1' => 'nullable|string',
        'text2' => 'nullable|string',
        'text3' => 'nullable|string',
        'boolean1' => 'nullable|boolean',
        'date1' => 'nullable|date',
        'time1' => 'nullable',
        'categoria1_id' => 'nullable|exists:categoria1,id',
    ]);

    $tabla1 = Tabla1::findOrFail($id);

    // Si se sube una nueva imagen, la guardamos en la carpeta 'public' y actualizamos el nombre del archivo
    if ($request->hasFile('varchar7')) {
        $file = $request->file('varchar7');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/imagen/tabla1'), $filename);
        $data['varchar7'] = 'assets/imagen/tabla1/' . $filename; // Guardamos la ruta relativa

        // Opción para eliminar la imagen antigua si existe
        if ($tabla1->varchar7 && file_exists(public_path($tabla1->varchar7))) {
            unlink(public_path($tabla1->varchar7));
        }
    }

    $tabla1->update($data);

    return response()->json([
        'message' => 'Registro actualizado satisfactoriamente.',
        'data' => new Tabla1Resource($tabla1),
    ], 200);
}

public function getCategoriasConRegistros()
    {
        // Consulta que obtiene el varchar1 de Categoria1 junto con los registros de Tabla1 relacionados
        $categoriasConRegistros = DB::table('categoria1')
            ->join('tabla1', 'categoria1.id', '=', 'tabla1.categoria1_id')
            ->select('categoria1.varchar1 as categoria', 'tabla1.*')
            ->get();

        // Retornar el resultado en formato JSON
        return response()->json($categoriasConRegistros);
    }
}
