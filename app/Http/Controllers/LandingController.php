<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Skill;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        $totalProjects = Project::all()->count();
        $totalClients = Client::all()->count();
        $totalSkills = Skill::all()->count();

        $Clients = Client::all();
        return view('Home', compact('user', 'totalProjects', 'totalClients', 'totalSkills', 'Clients'));
    }
}
