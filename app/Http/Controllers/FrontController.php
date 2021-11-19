<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\UnitTypesImg;
use App\Models\Tower;
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
        ]);
    }

    public function unit($id){
        return view('pages.unit', [
            'unit'=>Unit::find($id),
        ]);
    }
}
