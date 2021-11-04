<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tower;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $tower = new Tower();
        $tower->name = $request->input('name');
        $tower->units = $request->input('units');
        $tower->floors = $request->input('floors');
        $tower->created_at = now();
      

        $nameImg = 'img-render-'.strtolower(str_replace(" ", "", $request->input('name')));
        
        $imgPath = storage_path() . '/app/public/img/towers/' . $nameImg.'.webp';

        $imgFile = $request->file('imgfile');

        Image::make($imgFile)->save($imgPath.'.webp', 90, 'webp');

        //la ruta guardada en la tabla tiene que ser diferente para que funcione con asset()
        $tower->render_url = '/storage/img/towers/'.$nameImg.'.webp';
        $tower->save();

        $request->session()->flash('message', 'Torre Registrada Existosamente');
        return redirect()->route('all.towers');
    }

    public function changeVisibility(Request $request, $id){

        $tower = Tower::find($id);
        $tower->visible = $request->input('visibility');
        $tower->updated_at = now();
        $tower->save();
    
        return redirect()->route('all.towers');
    }

    public function edit($id){
        return view('admin.towers.edit', ['tower' => Tower::find($id) ]);
    }
}
