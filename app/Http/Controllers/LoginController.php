<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()  {
        //login.index masuk kedalam folder login
        return view("login.index",[
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request)  
    {
       $login = $request->validate([
            "email" => "required|email:dns",
            "password" => "required",
        ]);   
        
        if (Auth::attempt($login)) {
            # code...
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with("loginerror","Login Failed!");
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
