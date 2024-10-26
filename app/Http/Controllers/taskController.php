<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

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
        $data['user_id'] = 1;
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
        $task = Task::find($id);
        $is_done = $task->is_done;
        $task->update(["is_done" => !$is_done]);
        return \redirect(\route("home"));
    }

    public function delete(Request $request){
        $id = $request->id;
        $task = Task::find($id);
        $task->delete();
        return \redirect(\route("home"));
    }
}
