<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\UnitTypesImg;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UnitTypesController extends Controller
{
    //

    public function all(Request $request)
    {
        $types =  UnitType::all() ;

        return response(json_encode($types),200)->header('Content-type','text/plain');
    }

    public function index()
    {
        return view('admin.prototypes.index', ['unitTypes' => UnitType::all() ]);
    }

    public function create(){
        return view('admin.prototypes.create');
    }

    public function edit($id)
    {
        return view('admin.prototypes.edit', [
            'prototype'  => UnitType::find($id),
            'imgs'       => UnitTypesImg::all(),
        ]);
    }

    public function store(Request $request){

        $fileArray = array(
            'image'=> $request->file('mainfile'),
            'gallery'=> $request->file('imgfiles')
        );

        $rules = array(
            'image'=>'max:2000',
            'gallery'=>'max:2000',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $type = new UnitType();
            $type->name = $request->input('name');
            $type->bedrooms = $request->input('bedrooms');
            $type->bathrooms = $request->input('bathrooms');
            $type->half_baths = $request->input('half_baths');
            $type->meters_total = $request->input('const');
            $type->meters_int = $request->input('interior');
            $type->meters_ext = $request->input('exterior');
            $type->description = $request->input('description');
            $type->created_at = now();
            $type->save();
            
            //imagen principal large
            $mainImg = new UnitTypesImg();
            $mainImg->unit_type_id = $type->id;
            $mainImg->type = 'main';
            $mainImg->size = 'large';
    
            $nameMainImg = 'img-main-large-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
            $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImg;
            $imgFile = $request->file('mainfile');
            Image::make($imgFile)->resize(null, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mainImgPath, 90, 'png');
            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImg->url = '/storage/img/unit-types/'.$nameMainImg;
            $mainImg->save();
    
            //imagen principal medium
            $medImg = new UnitTypesImg();
            $medImg->unit_type_id = $type->id;
            $medImg->type = 'main';
            $medImg->size = 'medium';
    
            $nameMainImgMed = 'img-main-medium-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
            $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImgMed;
           
            Image::make($imgFile)->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mainImgPath, 90, 'png');

            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $medImg->url = '/storage/img/unit-types/'.$nameMainImgMed;
            $medImg->save();

             //imagen principal small
             $smImg = new UnitTypesImg();
             $smImg->unit_type_id = $type->id;
             $smImg->type = 'main';
             $smImg->size = 'small';
     
             $nameMainImgSm = 'img-main-small-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
             $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImgSm;
            
             Image::make($imgFile)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mainImgPath, 90, 'png');
             //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
             $smImg->url = '/storage/img/unit-types/'.$nameMainImgSm;
             $smImg->save();

             //imagenes de la galería
            $imageFiles = $request->file('imgfiles');
        
            $i=0;
            foreach($imageFiles as $imageFile){

                //imagen galeria large
                $galImg = new UnitTypesImg();
                $galImg->unit_type_id = $type->id;
                $galImg->type = 'gallery';
                $galImg->size = 'large';
        
                $nameGalImg = 'img-gallery-large-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImg;
                
                Image::make($imageFile)->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 100, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImg->url = '/storage/img/unit-types/'.$nameGalImg;
                $galImg->save();
        

                //imagen galeria medium
                $galImgMed = new UnitTypesImg();
                $galImgMed->unit_type_id = $type->id;
                $galImgMed->type = 'gallery';
                $galImgMed->size = 'medium';
        
                $nameGalImgMed = 'img-gallery-medium-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImgMed;
                
                Image::make($imageFile)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 90, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImgMed->url = '/storage/img/unit-types/'.$nameGalImgMed;
                $galImgMed->save();


                //imagen galeria small
                $galImgSm = new UnitTypesImg();
                $galImgSm->unit_type_id = $type->id;
                $galImgSm->type = 'gallery';
                $galImgSm->size = 'small';
        
                $nameGalImgSm = 'img-gallery-small-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImgSm;
                
                Image::make($imageFile)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($galImgPath, 80, 'webp');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $galImgSm->url = '/storage/img/unit-types/'.$nameGalImgSm;
                $galImgSm->save();

                $i++;
            }
    
    
            $request->session()->flash('message', 'Prototipo registrado exitosamente');
            return redirect()->route('all.prototypes');

        }
    }

    public function update(Request $request, $id){
        
        $fileArray = array(
            'image'=> $request->file('mainfile'),
            'gallery'=> $request->file('imgfiles')
        );

        $rules = array(
            'image'=>'max:2000',
            'gallery'=>'max:2000',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $type = UnitType::find($id);
            $type->name = $request->input('name');
            $type->bedrooms = $request->input('bedrooms');
            $type->bathrooms = $request->input('bathrooms');
            $type->half_baths = $request->input('half_baths');
            $type->meters_total = $request->input('const');
            $type->meters_int = $request->input('interior');
            $type->meters_ext = $request->input('exterior');
            $type->description = $request->input('description');
            $type->updated_at = now();
            $type->save();
            

            if(!empty($request->file('mainfile'))){
                //imagen principal large
                $mainImg = new UnitTypesImg();
                $mainImg->unit_type_id = $type->id;
                $mainImg->type = 'main';
                $mainImg->size = 'large';
        
                $nameMainImg = 'img-main-large-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
                $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImg;

                $imgFile = $request->file('mainfile');

                Image::make($imgFile)->resize(null, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($mainImgPath, 90, 'png');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $mainImg->url = '/storage/img/unit-types/'.$nameMainImg;
                $mainImg->save();
        
                //imagen principal medium
                $medImg = new UnitTypesImg();
                $medImg->unit_type_id = $type->id;
                $medImg->type = 'main';
                $medImg->size = 'medium';
        
                $nameMainImgMed = 'img-main-medium-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
                $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImgMed;
            
                Image::make($imgFile)->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($mainImgPath, 90, 'png');

                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $medImg->url = '/storage/img/unit-types/'.$nameMainImgMed;
                $medImg->save();

                //imagen principal small
                $smImg = new UnitTypesImg();
                $smImg->unit_type_id = $type->id;
                $smImg->type = 'main';
                $smImg->size = 'small';
        
                $nameMainImgSm = 'img-main-small-'.strtolower(str_replace(" ", "", $request->input('name').'.png'));
                $mainImgPath = storage_path() . '/app/public/img/unit-types/' . $nameMainImgSm;
                
                Image::make($imgFile)->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($mainImgPath, 90, 'png');
                //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                $smImg->url = '/storage/img/unit-types/'.$nameMainImgSm;
                $smImg->save();
            }


            //imagenes de la galería
            if(!empty($request->file('imgfiles'))){
           
                $imageFiles = $request->file('imgfiles');
            
                $i=0;
                foreach($imageFiles as $imageFile){

                    //imagen galeria large
                    $galImg = new UnitTypesImg();
                    $galImg->unit_type_id = $type->id;
                    $galImg->type = 'gallery';
                    $galImg->size = 'large';
            
                    $nameGalImg = 'img-gallery-large-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImg;
                    
                    Image::make($imageFile)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 100, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImg->url = '/storage/img/unit-types/'.$nameGalImg;
                    $galImg->save();
            

                    //imagen galeria medium
                    $galImgMed = new UnitTypesImg();
                    $galImgMed->unit_type_id = $type->id;
                    $galImgMed->type = 'gallery';
                    $galImgMed->size = 'medium';
            
                    $nameGalImgMed = 'img-gallery-medium-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImgMed;
                    
                    Image::make($imageFile)->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 90, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImgMed->url = '/storage/img/unit-types/'.$nameGalImgMed;
                    $galImgMed->save();


                    //imagen galeria small
                    $galImgSm = new UnitTypesImg();
                    $galImgSm->unit_type_id = $type->id;
                    $galImgSm->type = 'gallery';
                    $galImgSm->size = 'small';
            
                    $nameGalImgSm = 'img-gallery-small-'.strtolower(str_replace(" ", "", $request->input('name').'-'.$i.'.webp'));
                    $galImgPath = storage_path() . '/app/public/img/unit-types/' . $nameGalImgSm;
                    
                    Image::make($imageFile)->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($galImgPath, 80, 'webp');
                    //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
                    $galImgSm->url = '/storage/img/unit-types/'.$nameGalImgSm;
                    $galImgSm->save();

                    $i++;
                }
            }
            
    
            $request->session()->flash('message', 'Cambios Guardados');
            return redirect()->route('all.prototypes');
           
        }
    }
}
