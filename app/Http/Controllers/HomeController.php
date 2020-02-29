<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AwStudio\Fjord\Support\Facades\Form;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'formFields' => Form::load('pages', 'home')
        ]);
    }
}
