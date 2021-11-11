<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tower;
use App\Models\TowerImg;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class TowersController extends Controller
{
    //
    public function index()
    {
        return view('admin.towers.index', ['towers' => Tower::all() ]);
    }

    public function create(){
        return view('admin.towers.create');
    }

    public function store(Request $request){
        $fileArray = array(
            'image'=> $request->file('imgfile'),
        );

        $rules = array(
            'image'=>'max:2048',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $tower = new Tower();
            $tower->name = $request->input('name');
            $tower->units = $request->input('units');
            //$tower->floors = $request->input('floors');
            $tower->created_at = now();
            $tower->save();

            //crear imagenes en 3 tamaños
            //large
            $mainImg = new TowerImg();
            $mainImg->tower_id = $tower->id;
            $mainImg->type = 'main';
            $mainImg->size = 'large';

            $nameImg = 'img-torre-large-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImg;

            $imgFile = $request->file('imgfile');

            Image::make($imgFile)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 100, 'webp');

            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImg->url = '/storage/img/towers/'.$nameImg;
            $mainImg ->created_at = now();
            $mainImg->save();

            //medium img
            $mainImgMed = new TowerImg();
            $mainImgMed->tower_id = $tower->id;
            $mainImgMed->type = 'main';
            $mainImgMed->size = 'medium';

            $nameImgMed = 'img-torre-medium-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImgMed;


            Image::make($imgFile)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 90, 'webp');

            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImgMed->url = '/storage/img/towers/'.$nameImgMed;
            $mainImgMed ->created_at = now();
            $mainImgMed->save();


            //small img
            $mainImgSm = new TowerImg();
            $mainImgSm->tower_id = $tower->id;
            $mainImgSm->type = 'main';
            $mainImgSm->size = 'small';
    
            $nameImgSm = 'img-torre-small-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImgSm;
    
    
            Image::make($imgFile)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 80, 'webp');
    
            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImgSm->url = '/storage/img/towers/'.$nameImgSm;
            $mainImgSm ->created_at = now();
            $mainImgSm->save();
            

            $request->session()->flash('message', 'Torre Registrada Existosamente');
            return redirect()->route('all.towers');
        }
    }

    public function changeVisibility(Request $request, $id){

        $tower = Tower::find($id);
        $tower->visible = $request->input('visibility');
        $tower->updated_at = now();
        $tower->save();
    
        return redirect()->route('all.towers');
    }

    public function edit($id){
        return view('admin.towers.edit', [
            'tower' => Tower::find($id),
            'imgs'  => TowerImg::all()->where('tower_id', $id),
        ]);
    }

    public function update(Request $request, $id){

        $fileArray = array(
            'image'=> $request->file('imgfile'),
        );

        $rules = array(
            'image'=>'max:2048',
        );

        $validator = Validator::make( $fileArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }else{
            $tower = Tower::find($id);
            $tower->name = $request->input('name');
            $tower->units = $request->input('units');
            //$tower->floors = $request->input('floors');
            
            //actualizar imagen
            if(!empty($request->file('imgfile'))){

            //crear imagenes en 3 tamaños
            //large
            $mainImg = new TowerImg();
            $mainImg->tower_id = $tower->id;
            $mainImg->type = 'main';
            $mainImg->size = 'large';

            $nameImg = 'img-torre-large-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImg;

            $imgFile = $request->file('imgfile');

            Image::make($imgFile)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 100, 'webp');

            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImg->url = '/storage/img/towers/'.$nameImg;
            $mainImg ->created_at = now();
            $mainImg->save();

            //medium img
            $mainImgMed = new TowerImg();
            $mainImgMed->tower_id = $tower->id;
            $mainImgMed->type = 'main';
            $mainImgMed->size = 'medium';

            $nameImgMed = 'img-torre-medium-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImgMed;


            Image::make($imgFile)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 90, 'webp');

            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImgMed->url = '/storage/img/towers/'.$nameImgMed;
            $mainImgMed ->created_at = now();
            $mainImgMed->save();


            //small img
            $mainImgSm = new TowerImg();
            $mainImgSm->tower_id = $tower->id;
            $mainImgSm->type = 'main';
            $mainImgSm->size = 'small';
    
            $nameImgSm = 'img-torre-small-'.strtolower(str_replace(" ", "", $request->input('name').'.webp'));
            
            $imgPath = storage_path() . '/app/public/img/towers/' . $nameImgSm;
    
    
            Image::make($imgFile)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($imgPath, 80, 'webp');
    
            //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
            $mainImgSm->url = '/storage/img/towers/'.$nameImgSm;
            $mainImgSm ->created_at = now();
            $mainImgSm->save();
            }

            $tower->updated_at = now();
            $tower->save();

            $request->session()->flash('message', 'Cambios Guardados');
            return redirect()->route('all.towers');
        }
    }
}
