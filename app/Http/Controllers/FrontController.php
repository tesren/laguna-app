<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Shape;
use App\Models\UnitType;
use App\Models\UnitTypesImg;
use App\Models\Tower;
use App\Models\TowerImg;
use App\Models\Progress;
use App\Models\ProgressPost;
use App\Models\ProgressImg;

class FrontController extends Controller
{
    //
    public function home()
    {
        return view('pages.home', [
            'units' => Unit::all()->where('status','Disponible'),
            'unitTypes'=>UnitType::all(),
            'unitTypeImgs'=>UnitTypesImg::all()->where('type','main'),
        ]);
    }

    public function towers(){
        return view('pages.towers', [
            'towers'=>Tower::all(),
        ]);
    }

    public function inventory($id){
        return view('pages.inventory', [
            'tower'=>Tower::find($id),
            'units'=>Unit::all()->where('tower_id',$id),
            //'shapes'=>Shape::all()->where('tower_id',$id),
            'img'=>TowerImg::all()->where('tower_id',$id)->where('size','medium')->first(),
            'imgjpg'=>TowerImg::all()->where('tower_id',$id)->where('size','full')->first(),
        ]);
    }

    public function unit($id){

        $unit = Unit::find($id);

        $unitType = $unit->type_id;

        $towerID = $unit->tower_id;

        return view('pages.unit', [
            'unit'=> $unit,
            'img' =>UnitTypesImg::all()->where('unit_type_id', $unitType)->where('size','large'),
            'towerImg'=> TowerImg::all()->where('tower_id',$towerID)->where('size','large')->first(),
            'towerImgJpg'=> TowerImg::all()->where('tower_id',$towerID)->where('size','full')->first(),
            'shape'=> Shape::all()->where('tower_id',$towerID)->where('unit_id', $unit->id)->first(),
        ]);
    }

    public function allTowers(Request $request)
    {
        $towers =  Tower::all();

        return response(json_encode($towers),200)->header('Content-type','text/plain');
    }

    public function search(Request $request){

        $minPrice = $request->input('minprice');
        if(!$minPrice){
            $minPrice = 0;
        } 

        $maxPrice = $request->input('maxprice');
        if(!$maxPrice){
            $maxPrice = 999999999;
        } 

        $type = $request->input('search-bedrooms');
        $tower = $request->input('search-towers');

        if($type=="" and !empty($tower) ){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->where('tower_id', $tower)->paginate(9),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);
        }
        elseif($tower=="" and !empty($type)){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->where('type_id', $type)->paginate(9),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);

        }
        elseif($tower=="" and $type==""){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->paginate(9),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);
        }
        else{
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->where('type_id', $type)->where('tower_id', $tower)->paginate(9),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);
        }
    }

    public function progress(){
        return view('pages.cprogress', [
            'posts'=> ProgressPost::orderByDesc('date')->get(),
            'imgs' => ProgressImg::all()->where('size', 'medium'),
        ]);
    }
}
