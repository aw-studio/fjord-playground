<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();

        return view('pages.projects', [
            'projects' => $projects
        ]);
    }
}
