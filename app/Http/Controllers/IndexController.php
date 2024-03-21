<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user != null) {
            $studentInfo = $user->userable;
            return view('index', compact('user', 'studentInfo'));
        } else {
            return view('index', compact('user'));
        }
    }
}
