<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
        //     if (auth()->user()->role == 'admin') {
        //         return redirect()->route('admin');
        //     } else if (auth()->user()->role == 'school') {
        //         return redirect()->route('school');
        //     } else {
        //         return redirect()->route('index');
        //     }
        // } else {
        //     return redirect()->route('login')
        //         ->with('error', 'Email-Address And Password Are Wrong.');
        // }

        if (auth()->attempt(['email' => $input["email"], 'password' => $input['password']])) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->role == 'school') {
                return redirect()->route('school');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
