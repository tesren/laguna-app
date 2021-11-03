<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tower;

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

    public function changeVisibility(Request $request, $id){

        $tower = Tower::find($id);
        $tower->visible = $request->input('visibility');
        $tower->updated_at = now();
        $tower->save();
    
        return redirect()->route('all.towers');
    }
}
