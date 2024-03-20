<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "login"]);

Route::get('logout', LogoutController::class);
Route::get('register', [RegisterController::class, "index"])->name("register");
Route::post('register', [RegisterController::class, "register"])->name("register");
