<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(Request $request){
        //2024-10-31 
        $fullDate = "";
        if($request->date){
            $fullDate = \date($request->date);
        }else{
           $fullDate = \date("Y-m-d"); 
        } 
        $userId = Auth::User()['id'];
        $carbonDate = Carbon::createFromDate($fullDate);
        // $carbonDate::setLocale("pt-BR");
        $data['date_as_string'] = $carbonDate->translatedFormat('d')." de ".\ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');
        $data['tasks'] = Task::where('user_id','=',$userId)->whereDate('duo_date', $fullDate)->get();
        $data['qtdTasksFinished'] = \count(Task::where('user_id','=',$userId)->where('is_done', '=', true)->whereDate('duo_date', \date("Y-m-d"))->get());
        return view('home',['data' => $data]);
    }
}
