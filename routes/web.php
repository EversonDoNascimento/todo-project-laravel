<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;


// Created middleware of authentication
// Grouping the routes for easy manutation
Route::middleware("auth")->group(function (){
    Route::get("/", [homeController::class, "index"])->name("home");
    Route::get("/task/create", [taskController::class, "create"])->name("task.create");
    Route::post("/task/create_action", [taskController::class, "create_action"])->name("task.create_action");
    Route::get("/task/edit", [taskController::class, "edit"])->name("task.edit");
    Route::post("/task/edit_action", [taskController::class, "edit_action"])->name("task.edit_action");
    Route::get("/task/is_done", [taskController::class, "is_done"])->name("task.is_done");
    Route::get("/task/delete", [taskController::class, "delete"])->name("task.delete");
    Route::get("/logout", [authController::class, "logout"])->name("user.logout");
});


Route::get("/login", [authController::class, "index"])->name("login");
Route::post("/login", [authController::class, "login_action"])->name("user.login_action");
Route::get("/register", [authController::class, "register"])->name("register");
Route::post("/register", [authController::class, "register_action"])->name("user.register_action");
