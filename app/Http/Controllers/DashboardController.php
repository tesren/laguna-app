<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Progress;
use App\Models\ProgressPost;
use App\Models\ProgressImg;
use App\Models\Unit;
use App\Models\Tower;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard', [
            'messages' => Message::all(), 
            'progress' => Progress::find(1),
            'progPosts'=> ProgressPost::all(),
            'progImgs' => ProgressImg::first(),
            'units'    => Unit::all(),  
            'towers'   => Tower::all(),
        ]);
    }
}
