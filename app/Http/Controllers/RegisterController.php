<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|string|email|unique:users|max:70',
            'password' => 'required|string|min:5|max:40|confirmed'
        ]);
    }
}
