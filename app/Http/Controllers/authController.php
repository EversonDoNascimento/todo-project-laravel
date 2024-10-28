<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index(Request $request){
        // dd(Auth::user());
        // If user was be authenticated, him redirection for home
        if(Auth::check()){
            return \redirect(\route("home"));
        }
        return view("login");
    }

    public function register(Request $request) {
        if(Auth::check()){
            return \redirect(\route("home"));
        }
        return view("register");
    }

    public function register_action(Request $request) {

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed"
        ]);
        $data = $request->only("name","email","password");
        $data["password"] = Hash::make($data["password"]);
        User::create($data);
        return \redirect(route("login"));
    }

    public function login_action(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $data = $request->only("email", "password");
        if(Auth::attempt($data)){
            return \redirect(\route("home"));
        }else{
            return \redirect(\route("login"));
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return \redirect(\route("login"));
    }
}
