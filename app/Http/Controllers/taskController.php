<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    public function index(Request $request){

    }

    public function create(Request $request){
        $user = User::find(1);
        return view('/task/create', ['categories' => $user->categories]);
    }

    public function edit(Request $request){
        $id = $request->id;
        $task = Task::find($id);
        if($task === null){
            return \redirect(route("home"));
        }
        $user = User::find(1);
        return view('/task/edit', ['categories' => $user->categories, 'task' => $task]);
    }

    public function create_action(Request $request) {
        $data = $request->only(["title","duo_date","description","category_id"]);
        $id = Auth::User()['id'];
        $data['user_id'] = $id;
        Task::create($data);
        return  \redirect(route('home'));
    }

    public function edit_action(Request $request){
        $data = $request->only(["id","title","duo_date","description","category_id"]);
        Task::where("id", $data['id'])->update($data);
        return \redirect(route("home"));
    }

    public function is_done(Request $request){
        $id = $request->id;
        $status = $request->status;
        $task = Task::find($id);
        if(!$task){
            return ["success" => false];
        }
        $task->update(["is_done" => $status]);
        return ["success" => true];
    }

    public function delete(Request $request){
        $id = $request->id;
        $task = Task::find($id);
        $task->delete();
        return \redirect(\route("home"));
    }
}
