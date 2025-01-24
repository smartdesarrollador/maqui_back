<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mision;
use Illuminate\Http\Response;

use App\Http\Requests\MisionRequest;



class MisionController extends Controller
{
    private $urlAssets;
    private $urlAssetsProd;

    public function __construct()
    {
        $this->urlAssets = 'assets/imagen/mision';
        $this->urlAssetsProd = config('myconfig.url_upload_mision');
        /* $this->urlAssetsProd = '/home1/iatecdigital/back.iatecdigital.com/assets/imagen/mision'; */
    }

    public function index(){
        $categories=Mision::find(1);
        return response()->json($categories,Response::HTTP_OK);
    }

    public function update(Request $request,$category){
        $category=Mision::find($category);
        $category->update($request->only('imagen_mision','titulo_mision'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function updateFile(Request $request)
{
    $id = $request->input('id_mision');
    $post = Mision::find(1);

    if (!$post) {
        return ['status' => false, 'message' => 'Imagen Not Found'];
    }

    if ($request->hasFile('imagen_mision')) {
        $completeFileName = $request->file('imagen_mision')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('imagen_mision')->getClientOriginalExtension();
        $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        
         $path = $request->file('imagen_mision')->move($this->urlAssetsProd, $compPic);
         //$path = $request->file('imagen_mision')->move(public_path($this->urlAssets), $compPic);

        
        

        
        if ($post->imagen_mision) {
            
            $this->deleteFile($post->imagen_mision);
        }

        $post->imagen_mision = $compPic;
        
        $post->url_imagen_mision = $this->urlAssets.'/'.$compPic;

       

    }

    

    if ($post->save()) {
        return ['status' => true, 'message' => 'Post Updated Successfully '];
    } else {
        return ['status' => false, 'message' => 'Something Went Wrong'];
    }
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
