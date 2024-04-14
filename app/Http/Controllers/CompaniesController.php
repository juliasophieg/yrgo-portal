<?php

namespace App\Http\Controllers;

use App\Models\Technologies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompaniesController extends Controller
{
    public function index()
    {
        // Redirect to index if the user role = company
        if (Auth::user()->role === 'company') {
            return redirect('/');
        }

        $technologies = Technologies::all();
        $user = Auth::user();
        //todo: exclude athenticated usert
        $companies = User::where("role", "=", "company")->orderBy("name", "desc")->get();

        return view("companies")->with("companies", $companies)->with("technologies", $technologies);
    }

    public function companyById(Request $request)
    {
        $user = User::find($request->id);
        $extraInfo = $user->userable;
        return view("profile")->with("user", $user)->with("extraInfo", $extraInfo);
    }

    public function searchCompaniesByTechnologies(Request $request)
    {
        $technologyNamesString = $request->input('technology_names'); // Get the comma-separated string
        $technologyNamesArray = explode(',', $technologyNamesString); // Convert the string to an array

        if (count($technologyNamesArray) <= 0) {
            $companies = User::where("role", "=", "company")->orderBy("name", "desc")->get();
        } else {
            $technologies = Technologies::all();

            // Initialize the query with companies
            $query = User::where("role", "=", "company");

            // Loop through each technology name and filter users
            foreach ($technologyNamesArray as $technologyName) {
                $query->whereHas('technologies', function ($query) use ($technologyName) {
                    $query->where('name', $technologyName);
                });
            }
            // Retrieve the filtered users
            $companies = $query->get();
        }

        return view("companies")->with("companies", $companies)->with("technologies", $technologies);
    }
}
