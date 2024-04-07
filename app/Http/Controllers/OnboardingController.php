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
        $technologies = Technologies::all();
        return view('onboarding')->with("technologies", $technologies)->with("user", $user);
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'technology_names_searching' => 'required|string',
            'technology_names_using' => 'required|string',
        ]);

        $technologyNamesSearchingString = $request->input('technology_names_searching');
        $technologyNamesUsingString = $request->input('technology_names_using');

        $technologyNamesSearchingArray = explode(',', $technologyNamesSearchingString);
        $technologyNamesUsingArray = explode(',', $technologyNamesUsingString);

        $user = Auth::user();

        $job = UserJob::create([
            'user_id' => $user->id,
            'description' => '',
        ]);

        foreach ($technologyNamesSearchingArray as $technologyName) {
            $technology = Technologies::where("name", "=", $technologyName)->first();
            if ($technology) {
                $job->technologies()->attach($technology);
                $job->save();
            }
        }

        foreach ($technologyNamesUsingArray as $technologyName) {
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
