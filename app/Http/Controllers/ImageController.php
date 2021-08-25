<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use League\CommonMark\Inline\Element\Image;
use Image;

class ImageController extends Controller
{
    public function __construct()
    {
        
    }

    public function store(Request $request){

            if($request->hasfile('image')){

                if ($request->id){
                $usuario = User::find($request->id);
                $foto = $usuario->profile_pic;
                Storage::delete('public/img/normal'.$foto);
                Storage::delete('public/img/thumbnail'.'_small_'.$foto);
            }



            $filenamewithextension = $request->image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $smallthumbnail = '_small_'.$filename.'_'.time().'.'.$extension;

           
            $request->image->storeAs('storage/public/img/normal/', $filenametostore);            
            $request->image->storeAs('storage/public/img/thumbnail/', $smallthumbnail);
           
            $smallthumbnailpath = public_path('storage/img/thumbnail/'.$smallthumbnail);
            
            $this->createThumbnail($smallthumbnailpath,150,93);
           
          
            return response()->json(array('nomeArquivo'=>$filenametostore));
            
        } else{
            return response()->json(array('nomeArquivo' => 'arquivo não recebido'));
        }
    }

    public function createThumbnail($path, $width, $height){

        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });

        $img->save($path);
    }

    public function getImages($imagem){
        return Image::make(file_get_contents('file://'.storage_path('app/public/img/normal/'.$imagem)))->response();
    }

    public function getThumbnail($imagem){
        return Image::make(file_get_contents('file://'.storage_path('/app/public/img/thumbnail/'.'_small_'.$imagem)))->response();
    }


    public function excluir(Request $request){
        $foto = $request->get('image');
        Storage::delete('public/img/normal/'.$foto);
        Storage::delete('public/img/thumbnail/'.'_small_'.$foto);
        return response()->json(array('nomeArquivo'=>'boy.png'));  
    }


}