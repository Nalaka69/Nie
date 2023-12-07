<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function userHome()
    {
        return view('app.welcome.index');
    }

    // public function schoolHome()
    // {
    //     return view('home',["msg"=>"I am Editor role"]);
    // }

    public function adminHome()
    {
        return view('app.admin.admin');
    }
}
