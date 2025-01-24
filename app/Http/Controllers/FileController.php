<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Models\Medio;
use App\Models\TipoMedio;

class FileController extends Controller
{
    private $urlAssets;
    private $urlAssetsProd;

    public function __construct()
    {
        // Inicializar la variable global en el constructor
        $this->urlAssets = 'assets/imagen/banner';
        $this->urlAssetsProd = config('myconfig.url_upload_banner');
        /* $this->urlAssetsProd = '/home1/iatecdigital/back.iatecdigital.com/assets/imagen/banner'; */
    }

    public function index(){
        $medios=Medio::all();
        return response()->json($medios,Response::HTTP_OK);
    }

    public function file(Request $request)
    {
        $post = new Medio();

        if ($request->hasFile('nombre')) {
            $completeFileName = $request->file('nombre')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extenshion = $request->file('nombre')->getClientOriginalExtension();
            $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
           $path = $request->file('nombre')->move($this->urlAssetsProd, $compPic);
           //$path = $request->file('nombre')->move(public_path($this->urlAssets), $compPic);

        $post->nombre = $compPic;
        $post->url = $this->urlAssets.'/'.$compPic; 
        }
        if ($post->save()) {
            return ['status' => true, 'message' => 'Post Saved Successfully'];
        } else {
            return ['status' => false, 'message' => 'Something Went Wrong'];
        }
    }

    public function updateFile(Request $request)
{
    $id = $request->input('id_medios');
    $post = Medio::find($id);

    if (!$post) {
        return ['status' => false, 'message' => 'Post Not Found'];
    }

    if ($request->hasFile('nombre')) {
        $completeFileName = $request->file('nombre')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('nombre')->getClientOriginalExtension();
        $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        
         $path = $request->file('nombre')->move($this->urlAssetsProd, $compPic);
         //$path = $request->file('nombre')->move(public_path($this->urlAssets), $compPic);

        
        

        
        if ($post->nombre) {
            
            $this->deleteFile($post->nombre);
        }

        $post->nombre = $compPic;
        
        $post->url = $this->urlAssets.'/'.$compPic;

       

    }

    

    if ($post->save()) {
        return ['status' => true, 'message' => 'Post Updated Successfully '];
    } else {
        return ['status' => false, 'message' => 'Something Went Wrong'];
    }
}

 public function destroy($category){
        $category=Medio::find($category);
        $this->deleteFile($category->nombre);
        $category->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }

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

}
