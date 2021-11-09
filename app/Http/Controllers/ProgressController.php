<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\ProgressPost;
use App\Models\ProgressImg;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProgressController extends Controller
{
    //

    public function index(){
        return view('admin.progress.index', [
            'progress' => Progress::find(1),
            'posts'    => ProgressPost::all(),
        ]);
    }

    public function updateProgress(Request $request, $id){
        $progress = Progress::find($id);
        $progress->percent = $request->input('percent');
        
        if($request->input('stage1')){
            $progress->st1_done = 1;
        }else{
            $progress->st1_done = 0;
        }

        if($request->input('stage2')){
            $progress->st2_done = 1;
        }else{
            $progress->st2_done = 0;
        }

        if($request->input('stage3')){
            $progress->st3_done = 1;
        }else{
            $progress->st3_done = 0;
        }

        if($request->input('stage4')){
            $progress->st4_done = 1;
        }else{
            $progress->st4_done = 0;
        }

        if($request->input('stage5')){
            $progress->st5_done = 1;
        }else{
            $progress->st5_done = 0;
        }

        if($request->input('stage6')){
            $progress->st6_done = 1;
        }else{
            $progress->st6_done = 0;
        }

        $progress->updated_at = now();
        $progress->save();

        $request->session()->flash('message', 'Cambios Guardados');
        return redirect()->route('all.progress');
    }

    public function create(){
        return view('admin.progress.create');
    }

    public function store(Request $request){

        $fileArray = array(
            'gallery'=> $request->file('imgfiles')
        );

        $rules = array(
            'gallery'=>'max:2000',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{

            $post = new ProgressPost();
            $post->title = $request->input('title');
            $post->date = $request->input('date');
            $post->description = $request->input('description');
            $post->created_at = now();
            $post->save();


            //imagenes de la galería
            $imageFiles = $request->file('imgfiles');
        
            $i=0;
            foreach($imageFiles as $imageFile){

                //imagen galeria large
                $galImg = new ProgressImg();
                $galImg->progress_post_id = $post->id;
                $galImg->size = 'large';
        
                $nameGalImg = 'img-gallery-large-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImg;
                
                Image::make($imageFile)->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 100, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImg->url = '/storage/img/progress/'.$nameGalImg;
                $galImg->save();
        

                //imagen galeria medium
                $galImgMed = new ProgressImg();
                $galImgMed->progress_post_id = $post->id;
                $galImgMed->size = 'medium';
        
                $nameGalImg = 'img-gallery-medium-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImg;
                
                Image::make($imageFile)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 90, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImgMed->url = '/storage/img/progress/'.$nameGalImg;
                $galImgMed->save();


                //imagen galeria small
                $galImgSm = new ProgressImg();
                $galImgSm->progress_post_id = $post->id;
                $galImgSm->size = 'small';
        
                $nameGalImgSm = 'img-gallery-small-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImgSm;
                
                Image::make($imageFile)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 80, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImgSm->url = '/storage/img/progress/'.$nameGalImgSm;
                $galImgSm->save();

                $i++;
            }
    
    
            $request->session()->flash('message', 'Progreso registrado exitosamente');
            return redirect()->route('all.progress');

        }
    }

    public function edit($id){
        return view('admin.progress.edit', [
            'post'  => ProgressPost::find($id),
            'imgs'  => ProgressImg::all(),
        ]);
    }

    public function update(Request $request, $id){
        $fileArray = array(
            'gallery'=> $request->file('imgfiles')
        );

        $rules = array(
            'gallery'=>'max:2000',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{

            $post = ProgressPost::find($id);
            $post->title = $request->input('title');
            $post->date = $request->input('date');
            $post->description = $request->input('description');
            $post->updated_at = now();
            $post->save();


            //imagenes de la galería
            $imageFiles = $request->file('imgfiles');
        
            if(!empty($imageFiles)){
                $i=0;
                foreach($imageFiles as $imageFile){

                    //imagen galeria large
                    $galImg = new ProgressImg();
                    $galImg->progress_post_id = $post->id;
                    $galImg->size = 'large';
            
                    $nameGalImg = 'img-gallery-large-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImg;
                    
                    Image::make($imageFile)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 100, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImg->url = '/storage/img/progress/'.$nameGalImg;
                    $galImg->save();
            

                    //imagen galeria medium
                    $galImgMed = new ProgressImg();
                    $galImgMed->progress_post_id = $post->id;
                    $galImgMed->size = 'medium';
            
                    $nameGalImg = 'img-gallery-medium-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImg;
                    
                    Image::make($imageFile)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 90, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImgMed->url = '/storage/img/progress/'.$nameGalImg;
                    $galImgMed->save();


                    //imagen galeria small
                    $galImgSm = new ProgressImg();
                    $galImgSm->progress_post_id = $post->id;
                    $galImgSm->size = 'small';
            
                    $nameGalImgSm = 'img-gallery-small-'.strtolower(str_replace(" ", "", $request->input('title').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/progress/' . $nameGalImgSm;
                    
                    Image::make($imageFile)->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 80, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImgSm->url = '/storage/img/progress/'.$nameGalImgSm;
                    $galImgSm->save();

                    $i++;
                }

            }
            
            $request->session()->flash('message', 'Cambios guardados exitosamente');
            return redirect()->route('all.progress');
        }
    }
}
