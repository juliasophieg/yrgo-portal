<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [IndexController::class, "index"]);


Route::get("login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("login", [LoginController::class, "login"])->middleware("guest");

Route::get('logout', LogoutController::class)->name("logout");
Route::get('register', [RegisterController::class, "index"])->middleware("guest")->name("register");
Route::post('register', [RegisterController::class, "register"])->middleware("guest")->name("register");

Route::get('/profile', [ProfileController::class, "profile"])->name("profile");
