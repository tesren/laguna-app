<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitsController extends Controller
{
    //

    public function index()
    {
        return view('admin.units.index', ['units' => Unit::all() ]);
    }

    public function show($id)
    {
        return view('admin.units.show', ['unit' => Unit::find($id) ]);
    }
}
