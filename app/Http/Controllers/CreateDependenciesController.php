<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateDependenciesController extends Controller
{
    public function create()
    {
        return view('dependencies.create');
    }

    public function store()
    {

    }
}
