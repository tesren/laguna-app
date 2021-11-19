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
            'unitType'=>UnitType::all(),
            'unitTypeImg'=>UnitTypesImg::all(),
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
            'shapes'=>Shape::all()->where('tower_id',$id),
            'img'=>TowerImg::all()->where('tower_id',$id)->where('size','large')->first(),
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
            'shape'=> Shape::all()->where('tower_id',$towerID)->where('unit_id', $unit->id)->first(),
        ]);
    }
}
