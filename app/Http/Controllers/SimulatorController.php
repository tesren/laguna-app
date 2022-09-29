<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\Unit;
use App\Models\UnitTypesImg;
use App\Models\Shape;
use App\Models\Tower;
use App\Models\TowerImg;
use App\Models\Message;
use Barryvdh\DomPDF\Facade\Pdf;


class SimulatorController extends Controller
{
    //

    public function home(){
        $unitTypes = UnitType::all();
        $unitTypeImgs = UnitTypesImg::all()->where('type','main');
        $units = Unit::all()->where('status','Disponible');

        return view('pages.simulator.home', compact('unitTypes', 'unitTypeImgs', 'units'));
    }

    public function search(Request $request){
        $units = Unit::where('status','Disponible');

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $bedrooms = $request->input('bedrooms');

        $minFloor = $request->input('min_floor');
        $maxFloor = $request->input('max_floor');

        $minConst = $request->input('min_const');
        $maxConst = $request->input('max_const');


        if( isset($minPrice) ){
            $units->where('price', '>', $minPrice);
        }
        if( isset($maxPrice) ){
            $units->where('price', '<', $maxPrice);
        }

        if( isset($bedrooms) ){
            $arrBeds = str_split($bedrooms);

            $units->whereIn( 'type_id', $arrBeds );
        }

        if( isset($minFloor) ){
            $units->where('floor', '>', $minFloor);
        }
        if( isset($maxFloor) ){
            $units->where('floor', '<', $maxFloor);
        }

        if( isset($minConst) ){
            $units->where('meters_total', '>', $minConst);
        }
        if( isset($maxConst) ){
            $units->where('meters_total', '<', $maxConst);
        }

        $units = $units->paginate(9)->appends(request()->query());
        $imgs  = UnitTypesImg::where('type','main')->where('size', 'medium')->get();

        return view('pages.simulator.search', compact('units', 'imgs'));

    }

    public function single($id){
        $unit = Unit::find($id);

        //Unidades para comparar en el cotizador
        $units = Unit::where('status', 'Disponible')->get();

        $unitType = $unit->type_id;
        $towerID = $unit->tower_id;

        $img = UnitTypesImg::where('unit_type_id', $unitType)->get();
        $blueprint = UnitTypesImg::where('unit_type_id', $unitType)->where('type', 'blueprint')->where('size', 'large')->first();
        $towerImg= TowerImg::where('tower_id',$towerID)->where('size','large')->first();
        $towerImgJpg = TowerImg::where('tower_id',$towerID)->where('size','full')->first();
        $shape = Shape::where('tower_id',$towerID)->where('unit_id', $unit->id)->first();

        return view('pages.simulator.single', compact('unit', 'img', 'blueprint', 'towerImg', 'towerImgJpg', 'shape', 'units'));
    }

    //ajax
    public function units($id){
        $unitInfo = Unit::find($id);
        $unitType = $unitInfo->unitType;
        $tower = $unitInfo->tower;

        $arrayUnit = [
            'unit'     => $unitInfo, 
            'unitType' => $unitType,
            'tower'    => $tower,
        ];

        return response(json_encode($arrayUnit),200)->header('Content-type','text/plain');
    }

    public function sendLinkMail(Request $request){

        $msg = new Message();
        $msg->name = $request->input('name');
        $msg->subject = 'Mensaje de lagunalivingvallarta.com';
        $msg->email = $request->input('email');
        $msg->agent = $request->input('agent');
        $msg->phone = $request->input('phone');
        $msg->content = $request->input('message');

        //tipo de contacto
        $msg->type = $request->input('c-type');
        //$msg->unit = '';
        $msg->created_at = now();

         $msg->save();

        $to = 'info@lagunalivingvallarta.com';
        $subject = $msg->subject;

        $headers = 'Cc: michelena@punto401.com' . "\r\n";
        $headers .= 'Bcc: erick@punto401.com' . "\r\n";

        $body = 'Una persona dejó sus datos para poder descargar una cotización'."\r\n";
        $body .= $msg->content."\r\n";
        $body .= "Nombre: ".$msg->name."\r\n";
        $body .= "Correo: ".$msg->email."\r\n";
        $body .= "Teléfono: ".$msg->phone."\r\n";
        //$body .= "Agente: ".$msg->agent."\r\n";
        $body .= "Desde: ".$msg->type."\r\n";
        $body .= "Comentario: ".$msg->content."\r\n";
        mail($to, $subject, $body, $headers);


        //creamos y guardamos PDF

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        $unit1_id = $request->input('unit_1');
        $unit2_id = $request->input('unit_2');

        $unit1 = Unit::find($unit1_id );

        if( isset($unit2_id) ){
            $unit2 = Unit::find($unit2_id);
            $pdf->loadView('pages.simulator.pdf', compact('unit1', 'unit2'));
        }else{
            $pdf->loadView('pages.simulator.pdf', compact('unit1'));
        }

        $id = uniqid();
        $path = '/storage/PDFs/'. $id .'.pdf';
        $publicPath = public_path($path);
        $pdf->save($publicPath);

        //Mail para el cliente con el link
        $to = $msg->email;
        $subject = 'Laguna Living -  Descarga tu PDF';

        $headers = 'Bcc: erick@punto401.com' . "\r\n";

        $body = 'Para obtener el PDF de tu cotización por favor da clic en el siguiente enlace'."\r\n";
        $body .= url($path)."\r\n";
        
        mail($to, $subject, $body, $headers);


        return redirect()->back()->with('message', 'Gracias, revise su correo para obtener su archivo');

    }
}
