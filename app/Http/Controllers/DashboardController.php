<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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
        $lastPost = ProgressPost::orderBy('date','desc')->take(1)->first();

        $lastImg = ProgressImg::all()->where('progress_post_id', $lastPost->id)->where('size','small')->first();

        return view('admin.dashboard', [
            'messages' => Message::all(), 
            'progress' => Progress::find(1),
            'lastPost'=> $lastPost,
            'img' => $lastImg,
            'units'    => Unit::all(),  
            'towers'   => Tower::all(),
        ]);
    }
}
