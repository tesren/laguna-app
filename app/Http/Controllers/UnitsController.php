<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\Tower;

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
        $unit = new Unit();
        $unit->name = $request->input('unit');
        $unit->tower_id = $request->input('tower');
        $unit->type_id = $request->input('type');
        $unit->floor = $request->input('floor');
        $unit->price = $request->input('price');
        $unit->status = $request->input('status');
        $unit->created_at = now();
        $unit->save();

        return redirect()->route('create.unit')->with('message', 'Unidad registrada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->name = $request->input('unit');
        $unit->tower_id = $request->input('tower');
        $unit->type_id = $request->input('type');
        $unit->floor = $request->input('floor');
        $unit->price = $request->input('price');
        $unit->status = $request->input('status');
        $unit->updated_at = now();
        $unit->save();
        //$request->session()->flash('message', 'Cambios Guardados');
        
        return redirect()->route('show.unit',['id'=> $id])->with('message', 'Unidad actualizada exitosamente');
    }
}
