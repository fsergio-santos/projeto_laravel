<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
use Symfony\Component\Console\Output\ConsoleOutput;


class ImageController extends Controller
{
   
    private $out;

    public function __construct(ConsoleOutput $out)
    {
        $this->out = $out;
    }
 
    public function store(Request $request) {
      
     
       if( $request->hasFile('image') ) {
           $filenamewithextension = $request->image->getClientOriginalName();
           $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
           $extension = $request->image->getClientOriginalExtension();
           $filenametostore = $filename.'_'.time().'.'.$extension;
           $smallthumbnail = '_small_'.$filename.'_'.time().'.'.$extension;
           $request->image->storeAs('img/', $filenametostore);
           $request->image->storeAs('img/', $smallthumbnail);
           $smallthumbnailpath = public_path('storage/img/'.$smallthumbnail);
           $this->createThumbnail($smallthumbnailpath, 150, 93);
           return response()->json(array(
                'nomeArquivo' => $filenametostore,
           ));
        } else {
           return response()->json(array(
                'nomeArquivo' => 'arquivo não recebido',
           ));
        } 
        
    }

    public function createThumbnail($path, $width, $height)
    {

        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($path);
    }

    public function images($imagem){
        return Image::make(file_get_contents('file://'.storage_path('/app/public/img/'.$imagem )))->response();
    }

    public function excluir(Request $request){
        $myfoto = $request->get('myfoto');
        Storage::delete('img/'.$myfoto);
        Storage::delete('img/'.'_small_'.$myfoto);
        return response()->json(array('nomeArquivo' => $myfoto));
    }
}

    
/* //get filename without extension
$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
//get file extension
$extension = $request->file('public')->getClientOriginalExtension();

//filename to store
$filenametostore = $filename.'_'.time().'.'.$extension;

//small thumbnail name
$smallthumbnail = $filename.'_small_'.time().'.'.$extension;

//medium thumbnail name
$mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

//large thumbnail name
$largethumbnail = $filename.'_large_'.time().'.'.$extension;

//Upload File
$request->file('public')->storeAs('public/img/', $filenametostore);
$request->file('public')->storeAs('public/img/', $smallthumbnail);
$request->file('public')->storeAs('public/img/', $mediumthumbnail);
$request->file('public')->storeAs('public/img/', $largethumbnail);

//create small thumbnail
$smallthumbnailpath = public_path('storage/public/img/'.$smallthumbnail);
$this->createThumbnail($smallthumbnailpath, 150, 93);

//create medium thumbnail
$mediumthumbnailpath = public_path('storage/public/img/'.$mediumthumbnail);
$this->createThumbnail($mediumthumbnailpath, 300, 185);

//create large thumbnail
$largethumbnailpath = public_path('storage/public/img/'.$largethumbnail);
$this->createThumbnail($largethumbnailpath, 550, 340);
 */
    


