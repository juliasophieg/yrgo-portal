<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        if ($user != null) {
            $extraInfo = $user->userable;
            return view('profile', compact('user', 'extraInfo'));
        } else {
            return redirect('/');
        }
    }
}
