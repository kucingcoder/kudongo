<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        return view('Home');
    }
}
