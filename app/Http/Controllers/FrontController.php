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
        $imgjpg = TowerImg::where('tower_id',$id)->where('size','full')->first();

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

        $units = Unit::where('status', 'Disponible');

        $minPrice = $request->input('minprice');
        if($minPrice){
            $units = $units->where('price', '>=', $minPrice);
        } 

        $maxPrice = $request->input('maxprice');
        if($maxPrice){
            $units = $units->where('price', '<=', $maxPrice);
        } 

       
        $tower = $request->input('search-towers');
        if($tower){
            $units = $units->where('tower_id', $tower);
        }

        $type = $request->input('search-bedrooms');
        if($type){
            $arrTypes = str_split($type);
            $units = $units->whereIn('type_id', $arrTypes);
        }
    

        $units = $units->paginate(9)->appends(request()->query());
        $imgs  = UnitTypesImg::where('type','main')->where('size', 'medium')->get();
    
        return view('pages.search', compact('units', 'imgs'));

        
    }

    public function progress(){
        return view('pages.cprogress', [
            'posts'=> ProgressPost::orderByDesc('date')->get(),
            'imgs' => ProgressImg::all()->where('size', 'medium'),
        ]);
    }

    public function singleProgress($id){
        $post = ProgressPost::find($id);
        $imgs = ProgressImg::where('progress_post_id', $id)->where('type', 'image')->get();
        $videos = ProgressImg::where('progress_post_id', $id)->where('type', 'video')->get();

        return view('pages.single-progress', compact('post', 'imgs', 'videos'));
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

    public function landingPage(){
        
        $units = Unit::all()->where('status','Disponible');
        $unitTypes = UnitType::all();
        $unitTypeImgs = UnitTypesImg::all()->where('type','main');

        return view('pages.landing', compact('unitTypes', 'unitTypeImgs', 'units'));
    }

    public function privacyPolicy(){
        return view('pages.privacy-policy');
    }

}
