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
}
