<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
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

    public function projects()
    {
        $projects = Project::all();
        return view('Projects', compact('projects'));
    }

    public function projects_detail($id)
    {
        $project = Project::findOrFail($id);
        return view('ProjectsDetail', compact('project'));
    }

    public function skills()
    {
        $user = Auth::user();
        $skillCategories = SkillCategory::with('skills')->get();
        return view('Skills', compact('user', 'skillCategories'));
    }

    public function certificates()
    {
        $certificates = Certificate::all();
        return view('Certificates', compact('certificates'));
    }

    public function educations()
    {
        $user = Auth::user();
        $educations = Education::all();
        return view('Educations', compact('user', 'educations'));
    }

    public function experiences()
    {
        $experiences = Experience::all();
        return view('Experiences', compact('experiences'));
    }
}
