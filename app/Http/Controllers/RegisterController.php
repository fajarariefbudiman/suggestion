<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
       //
       public function index()  {
        //login.index masuk kedalam folder login
        return view("register.index",[
            "title" => "Sign Up",
        ]);
    }

        public function store(Request $request) {
           $validateData = $request->validate([
                "name" => "required|max:30",
                "username" => "required|max:30|unique:users",
                "email" => "required|email:dns|unique:users",
                "password" => "required|min:7|max:30",
            ]);

            $validateData["password"] = bcrypt($validateData["password"]);

            User::create($validateData);

            //$request->session()->flash("success","Registration Success! Please Login");

            return redirect("/login")->with('success','Registration Success! Please Login');

        }
}
