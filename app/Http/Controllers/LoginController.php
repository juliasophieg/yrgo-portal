<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $req)
    {
        $credentials = $req->only("email", "password");
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect("/")->with("user", $user);
        } else {
            return back()->withErrors(["msg" => "Incorrect Credentials"]);
        }
    }
}
