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

    public function likes()
    {

        $user = Auth::user();

        // Retrieve all the liked users by the authenticated user
        $likes = $user->likes;


        $likedUsers = $likes->map(function ($like) {
            return $like->likedUser;
        });

        // way to eagerload it with the collection of likes: $likedUsers = $user->likes->load('likedUser');
        // but in this instance we only need the user and not the like itself.

        return view("likes", compact("user", "likedUsers"));
    }
}
