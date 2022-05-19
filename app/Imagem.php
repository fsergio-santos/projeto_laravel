<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Image as InterventionImage;

class Image extends Model
{

    public function storeImage($photo){

        $filenamewithextension = $photo->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $photo->getClientOriginalExtension();
        $filenametostore = $filename.'_'.time().'.'.$extension;
        $smallthumbnail = '_small_'.$filename.'_'.time().'.'.$extension;
        $photo->storeAs('img/', $filenametostore);
        $photo->storeAs('img/', $smallthumbnail);
        $smallthumbnailpath = public_path('storage/img/'.$smallthumbnail);
        $this->createThumbnail($smallthumbnailpath, 150, 93);

        return $filenametostore;
    }

    public function createThumbnail($path, $width, $height)
    {

        $img = InterventionImage::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($path);
    }

    public function images($imagem){
        return InterventionImage::make(file_get_contents('file://'.storage_path('/app/public/img/'.$imagem )));
    }


    public function excluir($myfoto){
       
        //$myfoto = $request->get('myfoto');
        Storage::delete('img/'.$myfoto);
        Storage::delete('img/'.'_small_'.$myfoto);
    }


}
