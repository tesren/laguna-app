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
}
