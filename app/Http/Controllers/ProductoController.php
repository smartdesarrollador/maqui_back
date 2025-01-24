<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    private $urlAssets;
    private $urlAssetsProd;
    private $urlAssetsPdf;
    private $urlAssetsProdPdf;

    public function __construct()
    {
        $this->urlAssets = 'assets/imagen/producto';
        $this->urlAssetsProd = config('myconfig.url_upload_producto');
        /* $this->urlAssetsPdf = 'assets/pdf/producto';
        $this->urlAssetsProdPdf = config('myconfig.url_upload_producto_pdf'); */
        /* $this->urlAssetsProd = '/home1/iatecdigital/back.iatecdigital.com/assets/imagen/producto'; */
    }

   public function index()
    {
        $productos = Producto::all();
        return response()->json($productos, Response::HTTP_OK);
    }

    public function obtenerCursos()
    {
        $productos = DB::table('productos')
            ->where('categoria_producto_id', 1)
            ->get();

        return response()->json($productos);
    }

    public function obtenerEspecialidades()
    {
        $productos = DB::table('productos')
            ->where('categoria_producto_id', 2)
            ->get();

        return response()->json($productos);
    }

    public function obtenerDestacados()
    {
        $productos = DB::table('productos')
            ->where('destacado', 'true')
            ->get();

        return response()->json($productos);
    }

    public function store(ProductoRequest $request)
    {
        $productos=Producto::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$productos
        ],Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
         $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    public function update(ProductoRequest $request,$id){
        $id=Producto::find($id);
        $id->update($request->only('nombre','descripcion','precio'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'id'=>$id
        ],Response::HTTP_CREATED);
    }

   

     public function file(Request $request)
    {
        $producto= new Producto();

        if ($request->hasFile('imagen') || $request->hasFile('pdf')) {

            $nombre = $request->input('nombre');
            $resumen = $request->input('resumen');
            $descripcion = $request->input('descripcion');
            /* $duracion = $request->input('duracion'); */
            /* $maestro = $request->input('maestro'); */
            /* $observacion = $request->input('observacion'); */
            /* $precio = $request->input('precio'); */
            $destacado = $request->input('destacado');
            $categoria_producto_id = $request->input('categoria_producto_id');

            $completeFileName = $request->file('imagen')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extenshion = $request->file('imagen')->getClientOriginalExtension();
            $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
           $path = $request->file('imagen')->move($this->urlAssetsProd, $compPic);
           //$path = $request->file('imagen')->move(public_path($this->urlAssets), $compPic);

           /* $completeFileNamePdf = $request->file('pdf')->getClientOriginalName();
            $fileNameOnlyPdf = pathinfo($completeFileNamePdf, PATHINFO_FILENAME);
            $extenshionPdf = $request->file('pdf')->getClientOriginalExtension();
            $compPicPdf = str_replace('', '_', $fileNameOnlyPdf) . '-' . rand() . '_' . time() . '.' . $extenshionPdf;
           $path = $request->file('pdf')->move($this->urlAssetsProdPdf, $compPicPdf); */

            $producto->nombre = $nombre;
            $producto->resumen = $resumen;
            $producto->descripcion = $descripcion;
            /* $producto->duracion = $duracion; */
            $producto->imagen = $compPic;
            $producto->ruta_imagen = $this->urlAssets.'/'.$compPic;
            /* $producto->pdf = $compPicPdf;
            $producto->ruta_pdf = $this->urlAssetsPdf.'/'.$compPicPdf; */
            /* $producto->maestro = $maestro; */
            /* $producto->observacion = $observacion; */
            /* $producto->precio = $precio; */
            $producto->destacado = $destacado;
            $producto->categoria_producto_id = $categoria_producto_id;
        }
        if ($producto->save()) {
            return ['status' => true, 'message' => 'Datos guardados con exito'];
        } else {
            return ['status' => false, 'message' => 'Something Went Wrong'];
        }
    }

     public function updateFile(Request $request)
{
    $id = $request->input('id_producto');
    $nombre = $request->input('nombre');
    $resumen = $request->input('resumen');
    $descripcion = $request->input('descripcion');
    /* $duracion = $request->input('duracion'); */
    /* $maestro = $request->input('maestro'); */
    /* $observacion = $request->input('observacion'); */
    /* $precio = $request->input('precio'); */
    $destacado = $request->input('destacado');
    $categoria_producto_id = $request->input('categoria_producto_id');

    $producto = Producto::find($id);

    if (!$producto) {
        return ['status' => false, 'message' => 'Post Not Found'];
    }

    /* if ($request->hasFile('imagen') || $request->hasFile('pdf')) { */
    if ($request->hasFile('imagen')) {

        if ($request->hasFile('imagen')) {
             $completeFileName = $request->file('imagen')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('imagen')->getClientOriginalExtension();
        $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        
         $path = $request->file('imagen')->move($this->urlAssetsProd, $compPic);
         //$path = $request->file('imagen')->move(public_path($this->urlAssets), $compPic);
 
        if ($producto->imagen) {
            $this->deleteFile($producto->imagen);
        }

        $producto->nombre = $nombre;
        $producto->resumen = $resumen;
        $producto->descripcion = $descripcion;
        /* $producto->duracion = $duracion; */
        $producto->imagen = $compPic;
        $producto->ruta_imagen = $this->urlAssets.'/'.$compPic;
        /* $producto->maestro = $maestro; */
       /*  $producto->observacion = $observacion; */
        /* $producto->precio = $precio; */
        $producto->destacado = $destacado;
        $producto->categoria_producto_id = $categoria_producto_id;
        }

        /* if ($request->hasFile('pdf')) {
             $completeFileNamePdf = $request->file('pdf')->getClientOriginalName();
        $fileNameOnlyPdf = pathinfo($completeFileNamePdf, PATHINFO_FILENAME);
        $extensionPdf = $request->file('pdf')->getClientOriginalExtension();
        $compPicPdf = str_replace('', '_', $fileNameOnlyPdf) . '-' . rand() . '_' . time() . '.' . $extensionPdf;
         $path = $request->file('pdf')->move($this->urlAssetsProdPdf, $compPicPdf);
 
            if ($producto->pdf) {
            $this->deleteFilePdf($producto->pdf);
        }

        $producto->nombre = $nombre;
        $producto->resumen = $resumen;
        $producto->descripcion = $descripcion;
        $producto->duracion = $duracion;
        $producto->pdf = $compPicPdf;
        $producto->ruta_pdf = $this->urlAssetsPdf.'/'.$compPicPdf;
        
        $producto->observacion = $observacion;
        $producto->precio = $precio;
        $producto->destacado = $destacado;
        $producto->categoria_producto_id = $categoria_producto_id;
        } */

       

    }else{
         $producto->nombre = $nombre;
         $producto->resumen = $resumen;
        $producto->descripcion = $descripcion;
        /* $producto->duracion = $duracion; */
        /* $producto->maestro = $maestro; */
        /* $producto->observacion = $observacion; */
        /* $producto->precio = $precio; */
        $producto->destacado = $destacado;
        $producto->categoria_producto_id = $categoria_producto_id;
    }

    if ($producto->save()) {
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

public function deleteFilePdf($fileName)
{
    $filePath = $this->urlAssetsProdPdf . '/' . $fileName;
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

 public function destroy($id){
        $producto=Producto::find($id);
        $this->deleteFile($producto->imagen);
        $this->deleteFilePdf($producto->pdf);
        $producto->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }

/* public function destroyFile($id){
        $producto=Producto::find($id);
        $this->deleteFile($producto->imagen);
        $producto->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    } */
}
