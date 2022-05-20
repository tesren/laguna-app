<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Unit;
use App\Models\Shape;
use App\Models\UnitType;
use App\Models\UnitTypesImg;
use App\Models\Tower;
use App\Models\TowerImg;
use App\Models\Progress;
use App\Models\ProgressPost;
use App\Models\ProgressImg;
use App\Models\PaymentPlan;


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
        $tower = Tower::find($id);
        $units = Unit::where('tower_id',$id)->get();
        //$shapes=Shape::all()->where('tower_id',$id);
        $img = TowerImg::all()->where('tower_id',$id)->where('size','medium')->first();
        $imgjpg = TowerImg::all()->where('tower_id',$id)->where('size','full')->first();

        return view('pages.inventory', compact('tower', 'units', 'img', 'imgjpg'));
    }

    public function unit($id){
        $unit = Unit::find($id);

        $unitType = $unit->type_id;
        $towerID = $unit->tower_id;

        $img = UnitTypesImg::where('unit_type_id', $unitType)->get();
        $blueprint = UnitTypesImg::where('unit_type_id', $unitType)->where('type', 'blueprint')->where('size', 'large')->first();
        $towerImg= TowerImg::all()->where('tower_id',$towerID)->where('size','large')->first();
        $towerImgJpg = TowerImg::all()->where('tower_id',$towerID)->where('size','full')->first();
        $shape = Shape::all()->where('tower_id',$towerID)->where('unit_id', $unit->id)->first();
        $plans = PaymentPlan::where('tower_id', $towerID);

        return view('pages.unit', compact('unit', 'img', 'blueprint', 'towerImg', 'towerImgJpg', 'shape', 'plans'));
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

        $type = str_split($request->input('search-bedrooms'));
        $tower = $request->input('search-towers');

        if($type=="" and !empty($tower) ){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->where('tower_id', $tower)->paginate(9)->appends(request()->query()),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);
        }
        elseif($tower=="" and !empty($type)){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->whereIn('type_id', $type)->paginate(9)->appends(request()->query()),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);

        }
        elseif($tower=="" and $type==""){
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->paginate(9)->appends(request()->query()),
                'imgs'  => UnitTypesImg::all()->where('type','main')->where('size', 'medium'),
            ]);
        }
        else{
            return view('pages.search', [
                'units' => Unit::where('status','Disponible')->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice)->whereIn('type_id', $type)->where('tower_id', $tower)->paginate(9)->appends(request()->query()),
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

    public function setAgentCookie(Request $request){

        $agentName = $request->input('agent_cookie');
        $cookie = cookie('agent', $agentName, 43200);

        return redirect()->back()->withCookie($cookie);
    }

    public function getAgentCookie(Request $request){

        $cookie = $request->cookie('agent');

        echo $cookie;
    }
}
