<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    //

    public function index()
    {
        return view('admin.messages.index', ['messages' => Message::all() ]);
    }

    public function show($id)
    {
        return view('admin.messages.show', ['message' => Message::find($id) ]);
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        if($message){
            $message->delete();
        }
        return redirect()->route('all.messages');
    }

    public function store(Request $request){

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

        $body = $msg->content."\r\n";
        $body .= "De: ".$msg->name."\r\n";
        $body .= "Correo: ".$msg->email."\r\n";
        $body .= "Teléfono: ".$msg->phone."\r\n";
        $body .= "Agente: ".$msg->agent."\r\n";
        $body .= "Descripción: ".$msg->content."\r\n";
        mail($to, $subject, $body, $headers);

        return redirect()->back()->with('message', 'Gracias, su mensaje ha sido enviado');

    }

    public function changeAgent(Request $request , $id){
        $msg = Message::find($id);

        $msg->agent = $request->input('msg_agent');
        $msg->updated_at = now();
        $msg->save();
        
        return redirect()->back()->with('message', 'Agente Asignado');
    }
}
