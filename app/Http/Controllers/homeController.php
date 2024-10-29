<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(Request $request){ 
        $userId = Auth::User()['id'];
        $tasks = Task::where('user_id','=',$userId)->whereDate('duo_date', \date("Y-m-d"))->get();
        $qtdTasksFinished = Task::where('user_id','=',$userId)->where('is_done', '=', true)->whereDate('duo_date', \date("Y-m-d"))->get();
        return view('home',['tasks' => $tasks, 'qtdTasksFinished' => \count($qtdTasksFinished)]);
    }
}
