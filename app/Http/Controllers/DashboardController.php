<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard', ['messages' => Message::all() ]);
    }
}
