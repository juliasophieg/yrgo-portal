<?php

namespace App\Http\Controllers;

use App\Models\Technologies;
use App\Models\User;
use App\Models\UserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class OnboardingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $technologies = Technologies::orderBy('name')->get();
        return view('onboarding')->with("technologies", $technologies)->with("user", $user);
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'technology_names_using' => 'required|string',
        ], [
            'technology_names_using.required' => 'Vänligen välj teknologierna du/ni använder',
        ]);


        $technologyNamesSearchingString = $request->input('technology_names_using');

        $technologyNamesSearchingArray = explode(',', $technologyNamesSearchingString);

        $user = Auth::user();

        foreach ($technologyNamesSearchingArray as $technologyName) {
            $technology = Technologies::where("name", "=", $technologyName)->first();

            if ($technology) {
                $user->technologies()->attach($technology);
            }
        }

        $user->onboarding_completed = true;
        $user->save();
        return redirect('/')->with("user", $user);
    }
}
