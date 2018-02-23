<?php

namespace App\Http\Controllers;

use App\Dependencies;
use Illuminate\Http\Request;

class CreateDependenciesController extends Controller
{
    public function create()
    {
        return view('dependencies.create');
    }

    public function store(Request $request)
    {
        $dependency = Dependencies::create($request->all());

        return $dependency->name;
    }
}
