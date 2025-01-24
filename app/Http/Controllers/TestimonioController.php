<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testimonio;
use App\Http\Requests\TestimonioRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class TestimonioController extends Controller
{
    private $urlAssets;
    private $urlAssetsProd;

    public function __construct()
    {
        $this->urlAssets = 'assets/imagen/testimonio';
        $this->urlAssetsProd = config('myconfig.url_upload_testimonio');
        /* $this->urlAssetsProd = '/home1/iatecdigital/back.iatecdigital.com/assets/imagen/testimonio'; */
    }

   public function index()
    {
        $testimonios = Testimonio::all();
        return response()->json($testimonios, Response::HTTP_OK);
    }

    public function store(TestimonioRequest $request)
    {
        $testimonios=Testimonio::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$testimonios
        ],Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
         $testimonio = Testimonio::find($id);

        if (!$testimonio) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($testimonio, 200);
    }

    public function update(TestimonioRequest $request,$id){
        $id=Testimonio::find($id);
        $id->update($request->only('nombre','descripcion','precio'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'id'=>$id
        ],Response::HTTP_CREATED);
    }

    public function destroy($id){
        $id=Testimonio::find($id);
        $id->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }

     public function file(Request $request)
    {
        $testimonio= new Testimonio();

        if ($request->hasFile('imagen')) {

            $titulo = $request->input('titulo');
            $descripcion = $request->input('descripcion');
            
            $completeFileName = $request->file('imagen')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extenshion = $request->file('imagen')->getClientOriginalExtension();
            $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
           $path = $request->file('imagen')->move($this->urlAssetsProd, $compPic);
           //$path = $request->file('imagen')->move(public_path($this->urlAssets), $compPic);

            $testimonio->titulo = $titulo;
            $testimonio->descripcion = $descripcion;
            $testimonio->imagen = $compPic;
            $testimonio->ruta_imagen = $this->urlAssets.'/'.$compPic; 
            /* $testimonio->maestro = $maestro; */
        }
        if ($testimonio->save()) {
            return ['status' => true, 'message' => 'Datos guardados con exito'];
        } else {
            return ['status' => false, 'message' => 'Something Went Wrong'];
        }
    }

     public function updateFile(Request $request)
{
    $id = $request->input('id_testimonio');
    $titulo = $request->input('titulo');
    $descripcion = $request->input('descripcion');

    $testimonio = Testimonio::find($id);

    if (!$testimonio) {
        return ['status' => false, 'message' => 'Post Not Found'];
    }

    if ($request->hasFile('imagen')) {
        $completeFileName = $request->file('imagen')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('imagen')->getClientOriginalExtension();
        $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        
         $path = $request->file('imagen')->move($this->urlAssetsProd, $compPic);
         //$path = $request->file('imagen')->move(public_path($this->urlAssets), $compPic);
 
        if ($testimonio->imagen) {
            $this->deleteFile($testimonio->imagen);
        }

        $testimonio->titulo = $titulo;
        $testimonio->descripcion = $descripcion;
        $testimonio->imagen = $compPic;
        $testimonio->ruta_imagen = $this->urlAssets.'/'.$compPic;
        /* $testimonio->maestro = $maestro; */

    }else{
         $testimonio->titulo = $titulo;
        $testimonio->descripcion = $descripcion;
    }

    if ($testimonio->save()) {
        return ['status' => true, 'message' => 'Datos actualizados con exito'];
    } else {
        return ['status' => false, 'message' => 'Something Went Wrong'];
    }
}

// Eliminar imagen de carpeta de imagenes
    public function deleteFile($fileName)
{
    $filePath = $this->urlAssetsProd . '/' . $fileName;
    //$filePath = public_path($this->urlAssets .'/'. $fileName);

    
    if (file_exists($filePath)) {
        
        if (unlink($filePath)) {
            return true; 
            return false; 
        }
    } else {
        return true; 
    }
}

public function destroyFile($id){
        $testimonio=Testimonio::find($id);
        $this->deleteFile($testimonio->imagen);
        $testimonio->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }
}
