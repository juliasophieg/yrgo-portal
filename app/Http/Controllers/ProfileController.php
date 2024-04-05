<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentInfo;
use App\Models\CompanyInfo;
use App\Models\Technologies;

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
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to edit your profile.');
        }

        $extraInfo = $user->userable;
        $technologies = Technologies::all();
        return view('edit_profile', compact('user', 'extraInfo', 'technologies'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Update user info
        $user->name = $request->input('name');
        $user->description = $request->input('description');
        $user->linkedin = $request->input('linkedin');
        $user->facebook = $request->input('facebook');
        $user->phone = $request->input('phone');
        $user->save();

        // Update student or company info based on the user's role
        //If student
        if ($user->role === 'student') {
            $studentInfo = StudentInfo::findOrFail($user->userable_id);
            $studentInfo->update([
                'program' => $request->input('program'),
            ]);
        }
        // If company
        elseif ($user->role === 'company') {
            $companyInfo = CompanyInfo::findOrFail($user->userable_id);
            $companyInfo->update([
                'company_name' => $request->input('company_name'),
                'company_contact_email' => $request->input('email'),
                'company_contact_number' => $request->input('phone'),
                'company_website' => $request->input('website'),
                'company_industry' => $request->input('industry'),
                'employees' => $request->input('employees'),
                'looking_for' => $request->input('looking-for'),
                'location' => $request->input('location'),
                'total_positions' => $request->input('total_positions'),
            ]); //todo: validate the input
        }

        // Sync the user technologies
        $user->technologies()->sync($request->input('technologies'));

        return redirect('/profile')->with('success', 'Din profil har uppdaterats!');
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

    public function userTechnologies()
    {
        $user = Auth::user();
        $user->technologies;
        return view('profile', compact('user'));
    }
}
