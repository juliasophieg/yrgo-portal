<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentInfo;
use App\Models\CompanyInfo;
use App\Models\Technologies;
use Illuminate\Support\Facades\Storage;

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
            //Fetch the user's extra info based on their role
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

        //Fetch the user's extra info based on their role
        $extraInfo = $user->userable;

        // Fetch all technologies
        $technologies = Technologies::orderBy('name')->get();

        return view('edit_profile', compact('user', 'extraInfo', 'technologies'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:900',
            'linkedin' => 'nullable|url|max:100',
            'facebook' => 'nullable|string|max:30',
            'phone' => 'nullable|string|max:30',
            'website' => 'nullable|url|max:100',
        ], [
            'description.max' => 'Din beskrivning får innehålla max 900 tecken.',
            'name.required' => 'Du måste ange ditt namn.',
            'name.max' => 'Ditt namn får innehålla max 255 tecken.',
            'linkedin.url' => 'Länken till din LinkedIn-profil måste vara en URL.',
            'linkedin.max' => 'Länken till din LinkedIn-profil får innehålla max 100 tecken.',
            'facebook.max' => 'Ditt Instagram-namn får innehålla max 30 tecken.',
            'phone.max' => 'Ditt telefonnummer får innehålla max 30 tecken.',
            'website.url' => 'Länken till din hemsida måste vara en URL.',
            'website.max' => 'Länken till din hemsida får innehålla max 100 tecken.',
        ]);

        $user = User::findOrFail($id);

        // Update user info with validated data
        $user->name = $validatedData['name'];
        $user->description = $validatedData['description'];
        $user->linkedin = $validatedData['linkedin'];
        $user->facebook = $validatedData['facebook'];
        $user->phone = $validatedData['phone'];
        $user->website = $validatedData['website'];

        // Handle profile picture update
        if ($request->hasFile('profile_picture')) {


            $request->validate([
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2080',
            ], [
                'profile_picture.image' => 'Filen måste vara en bild.',
                'profile_picture.mimes' => 'Filen måste vara av formatet jpeg, png eller jpg.',
                'profile_picture.max' => 'Bilden är för stor. Bilden får vara max 2MB stor.',
            ]);

            // Get the existing profile picture path
            $existingImagePath = $user->profile_picture;

            // Store and update profile picture path
            $imageName = 'profile_' . $user->id . '.' . $request->file('profile_picture')->extension();
            $imagePath = $request->file('profile_picture')->storeAs('user_uploads', $imageName, 'public');

            // Check if the new image has the same name as the existing image
            if ($existingImagePath && Storage::exists($existingImagePath)) {
                //Delete the existing image
                Storage::delete($existingImagePath);
            }

            $user->profile_picture = $imagePath;
        }

        $user->save();

        // Validate the request data based on user's role
        if ($user->role === 'student') {
            $request->validate([
                'program' => 'string|max:100',
            ], [
                'program.max' => 'Programfältet får innehålla max 100 tecken.',

            ]);
        } elseif ($user->role === 'company') {
            $request->validate([
                'location' => 'string|max:255',
            ], [
                'location.max' => 'Adressfältet får innehålla max 255 tecken.'
            ]);
        }

        // Update student or company info based on the user's role
        if ($user->role === 'student') {
            $studentInfo = StudentInfo::findOrFail($user->userable_id);
            $studentInfo->update([
                'program' => $request->input('program'),
            ]);
        } elseif ($user->role === 'company') {
            $companyInfo = CompanyInfo::findOrFail($user->userable_id);
            $companyInfo->update([
                'location' => $request->input('location'),
            ]);
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
