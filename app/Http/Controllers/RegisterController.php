<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\StudentInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register");
    }
    public function register(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|string|email|unique:users|max:70',
            'password' => 'required|string|min:5|max:40',
            'role' => 'required|string'
        ]);
        if ($request->role == "student") {
            // Create the User record
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $studentInfo = StudentInfo::Create();
            $user->userable_id = $studentInfo->id;
            $user->userable_type = StudentInfo::class;
        } else {
            $user = User::create([

                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            $company = CompanyInfo::create();
            $user->userable_id = $company->id;
            $user->userable_type = CompanyInfo::class;
        }

        $extraInfo = $user->userable;
        $user->save();
        Auth::login($user);

        return redirect()->intended('/')->with("user", $user)->with("extraInfo", $extraInfo);
    }
}
