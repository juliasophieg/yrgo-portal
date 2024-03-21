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
            $extraInfo = $user->userable;
            return view('index', compact('user', 'extraInfo'));
        } else {
            return view('index', compact('user'));
        }
    }
}
