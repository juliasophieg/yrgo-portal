<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile($id = null)
    {
        // If no ID is provided, use the currently logged-in user's ID
        if ($id === null) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }

        if ($user != null) {
            $extraInfo = $user->userable;
            return view('profile', compact('user', 'extraInfo'));
        } else {
            return redirect('/');
        }
    }

    public function edit()
    {
        $user = Auth::user();
        $extraInfo = $user->userable;
        return view('edit_profile', compact('user', 'extraInfo'));
    }
}
