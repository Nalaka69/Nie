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
    public function index()
    {
        return view('app.welcome.index');
    }
    public function adminDashboard()
    {
        return view('app.admin.admin');
    }

    // public function schoolAdmin()
    // {
    //     return view('super_admin_dashboard');
    // }
}
