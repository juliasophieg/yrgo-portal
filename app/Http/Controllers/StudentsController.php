<?php

namespace App\Http\Controllers;

use App\Models\Technologies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    public function index()
    {
        $technologies = Technologies::all();
        $user = Auth::user();
        //todo: exclude athenticated usert 
        $students = User::where("role", "=", "student")->orderBy("name", "desc")->get();

        return view("students")->with("students", $students)->with("technologies", $technologies);
    }
    public function studentById(Request $request)
    {
        $user = User::find($request->id);
        $extraInfo = $user->userable;
        return view("profile")->with("user", $user)->with("extraInfo", $extraInfo);
    }
    public function searchStudentsByTechnologies(Request $request)
    {
        $technologyNamesString = $request->input('technology_names'); // Get the comma-separated string
        $technologyNamesArray = explode(',', $technologyNamesString); // Convert the string to an array

        if (count($technologyNamesArray) <= 0) {
            $students = User::where("role", "=", "student")->orderBy("name", "desc")->get();
        } else {
            $technologies = Technologies::all();

            // Initialize the query with all users
            $query = User::query();

            // Loop through each technology name and filter users
            foreach ($technologyNamesArray as $technologyName) {
                $query->whereHas('technologies', function ($query) use ($technologyName) {
                    $query->where('name', $technologyName);
                });
            }
            // Retrieve the filtered users
            $students = $query->get();
        }
        return view("students")->with("students", $students)->with("technologies", $technologies);
    }
}
