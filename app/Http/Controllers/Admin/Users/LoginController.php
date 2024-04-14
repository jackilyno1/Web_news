<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        $title = 'Login';
        return view('admin.users.login', compact('title'));
    }
    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email or Password is incorrect');
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
