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
        $msg->phone = $request->input('phone');
        $msg->content = $request->input('message');

        //tipo de contacto
        $msg->type = 'General';
        $msg->unit = '';
        $msg->created_at = now();

        $msg->save();

        $to = 'info@lagunalivingvallarta.com';
        $subject = $msg->subject;
        $body = $msg->content;

        $body .= "De: ".$msg->name."\r\n";
        $body .= "Correo: ".$msg->email."\r\n";
        $body .= "Teléfono: ".$msg->phone."\r\n";
        $body .= "Descripción: ".$msg->content."\r\n";
        mail($to, $subject, $body);

        return redirect()->back()->with('message', 'Gracias, su mensaje ha sido enviado');

    }
}
