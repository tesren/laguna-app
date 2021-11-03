<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitType;

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
        ]);
    }

    public function store(Request $request){
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

        $request->session()->flash('message', 'Prototipo registrado exitosamente');
        return redirect()->route('all.prototypes');
    }

    public function update(Request $request, $id){
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

        $request->session()->flash('message', 'Cambios Guardados');
        return redirect()->route('all.prototypes');
    }
}
