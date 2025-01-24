<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Http\Response;

class CarouselController extends Controller
{
    private $urlAssets;
    private $urlAssetsProd;

    public function __construct()
    {
        // Inicializar la variable global en el constructor
        $this->urlAssets = 'assets/imagen/carousel';
        $this->urlAssetsProd = config('myconfig.url_upload_carousel');
        /* $this->urlAssetsProd = '/home1/iatecdigital/back.iatecdigital.com/assets/imagen/carousel'; */

    }

    public function index(){
        $medios=Carousel::all();
        return response()->json($medios,Response::HTTP_OK);
    }

    public function file(Request $request)
    {
        $post = new Carousel();

        if ($request->hasFile('nombre_carousel')) {
            $completeFileName = $request->file('nombre_carousel')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extenshion = $request->file('nombre_carousel')->getClientOriginalExtension();
            $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
           $path = $request->file('nombre_carousel')->move($this->urlAssetsProd, $compPic);
           //$path = $request->file('nombre_carousel')->move(public_path($this->urlAssets), $compPic);

        $post->nombre_carousel = $compPic;
        $post->url_carousel = $this->urlAssets.'/'.$compPic; 
        }
        if ($post->save()) {
            return ['status' => true, 'message' => 'Post Saved Successfully'];
        } else {
            return ['status' => false, 'message' => 'Something Went Wrong'];
        }
    }

    public function updateFile(Request $request)
{
    $id = $request->input('id_carousel');
    $post = Carousel::find($id);

    if (!$post) {
        return ['status' => false, 'message' => 'Post Not Found'];
    }

    if ($request->hasFile('nombre_carousel')) {
        $completeFileName = $request->file('nombre_carousel')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('nombre_carousel')->getClientOriginalExtension();
        $compPic = str_replace('', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        
         $path = $request->file('nombre_carousel')->move($this->urlAssetsProd, $compPic);
         //$path = $request->file('nombre_carousel')->move(public_path($this->urlAssets), $compPic);

        
        

        
        if ($post->nombre_carousel) {
            
            $this->deleteFile($post->nombre_carousel);
        }

        $post->nombre_carousel = $compPic;
        
        $post->url_carousel = $this->urlAssets.'/'.$compPic;

       

    }

    

    if ($post->save()) {
        return ['status' => true, 'message' => 'Post Updated Successfully '];
    } else {
        return ['status' => false, 'message' => 'Something Went Wrong'];
    }
}

 public function destroy($category){
        $category=Carousel::find($category);
        $this->deleteFile($category->nombre_carousel);
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
