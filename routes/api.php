<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// Route return all users
Route::get("/users", [userController::class, "index"]);
// Route return one user
Route::get("/users/{id}", [userController::class, "findOne"]);