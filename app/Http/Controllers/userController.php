<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    // Function return all users
    public function index(Request $req){
        return User::all();
    }

    // Function return oneUSer
    public function findUser(Request $req){
        $id = $req['id'];
        if($id){
            $find = User::find($id);
            return $find;
        }
        return null;
    }

}
