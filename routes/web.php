<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", [homeController::class, "index"])->name("home");
// Route::get("/", [taskController::class, "index"])->name("task");
Route::get("/task/create", [taskController::class, "create"])->name("task.create");
Route::post("/task/create_action", [taskController::class, "create_action"])->name("task.create_action");
// Route::get("/task", [taskController::class, "findTask"])->name("task.find");
Route::get("/task/edit", [taskController::class, "edit"])->name("task.edit");
Route::post("/task/edit_action", [taskController::class, "edit_action"])->name("task.edit_action");
Route::get("/task/is_done", [taskController::class, "is_done"])->name("task.is_done");
Route::get("/task/delete", [taskController::class, "delete"])->name("task.delete");
Route::get("/login", [authController::class, "index"])->name("login");
Route::get("/register", [authController::class, "register"])->name("register");


// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/login', function (){
//     return view('login');
// });