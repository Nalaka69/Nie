<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return view('app.welcome.index');
    }
    public function about()
    {
        return view('app.welcome.about');
    }
}
