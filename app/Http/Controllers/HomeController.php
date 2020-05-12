<?php

namespace App\Http\Controllers;

use mysqli;
use MySQLDump;
use App\Models\Project;
use Illuminate\Http\Request;
use Fjord\Support\Facades\Form;

class HomeController extends Controller
{
    public function __invoke()
    {
        //$project = Project::orderByTranslation('en', 'title', 'asc')->first();

        //dd($project->title, "lol");

        return view('pages.home')->with([
            'home' => Form::load('pages', 'home')
        ]);
    }
}
