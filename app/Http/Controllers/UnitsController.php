<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\Tower;
use App\Models\Shape;
use Illuminate\Support\Facades\Validator;

class UnitsController extends Controller
{
    //

    public function index()
    {
        return view('admin.units.index', ['units' => Unit::all() ]);
    }

    public function show($id)
    {
        return view('admin.units.show', [
            'unit'      => Unit::find($id),
            'unitTypes' => UnitType::all(),
            'towers'    => Tower::all(), 
        ]);
    }

    public function create(){
        return view('admin.units.create', [
            'unitTypes' => UnitType::all(),
            'towers'    => Tower::all(), 
        ]);
    }

    public function store(Request $request){

        $inputArray = array(
            'unidad'=> $request->input('unit'),
        );

        $rules = array(
            'unidad'=>'unique:units,name',
        );

        $validator = Validator::make( $inputArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        }

        $unit = new Unit();
        $unit->name = $request->input('unit');
        $unit->tower_id = $request->input('tower');
        $unit->type_id = $request->input('type');
        $unit->floor = $request->input('floor');
        $unit->meters_total = $request->input('const');
        $unit->meters_int = $request->input('interior');
        $unit->meters_ext = $request->input('exterior');
        $unit->price = $request->input('price');
        $unit->status = $request->input('status');
        $unit->created_at = now();
        $unit->save();

        return redirect()->route('create.unit')->with('message', 'Unidad '.$unit->name.' registrada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);

        /* $inputArray = array(
            'unidad'=> $request->input('unit'),
        );

        $rules = array(
            'unidad'=>'unique:units,name,'.$unit->name,
        );

        $validator = Validator::make( $inputArray, $rules);

        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()->all()]);
        } */

        $unit->name = $request->input('unit');
        $unit->tower_id = $request->input('tower');
        $unit->type_id = $request->input('type');
        $unit->floor = $request->input('floor');
        $unit->meters_total = $request->input('const');
        $unit->meters_int = $request->input('interior');
        $unit->meters_ext = $request->input('exterior');
        $unit->price = $request->input('price');
        $unit->status = $request->input('status');
        $unit->updated_at = now();
        $unit->save();

        /* $shape = Shape::find($unit->id);
        if($shape){
            $shape->unit_id = $unit->id;
            $shape->tower_id = $unit->tower_id;
            $shape->points = $request->input('points');
            $shape->text_x = $request->input('text_x');
            $shape->text_y = $request->input('text_y');
            $shape->save();
        }else{
            $shape = new Shape();
            $shape->unit_id = $unit->id;
            $shape->tower_id = $unit->tower_id;
            $shape->points = $request->input('points');
            $shape->text_x = $request->input('text_x');
            $shape->text_y = $request->input('text_y');
            $shape->save();
        } */

        
        return redirect()->route('show.unit',['id'=> $id])->with('message', 'Unidad actualizada exitosamente');
    }
}
