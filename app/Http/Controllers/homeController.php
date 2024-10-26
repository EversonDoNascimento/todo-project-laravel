<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request){
        $tasks = Task::where('user_id', '=', 1)->get();
        return view('home',['tasks' => $tasks]);
    }
}
