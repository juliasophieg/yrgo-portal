<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GdprConsentController extends Controller
{
    public function index()
    {
        return view("gdpr_consent");
    }
}
