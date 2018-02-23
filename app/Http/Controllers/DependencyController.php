<?php

namespace App\Http\Controllers;

use App\Dependencies;
use Illuminate\Http\Request;

class DependencyController extends Controller
{
    public function show(Dependencies $dependencies)
    {
        return view('dependencies.show', compact('dependencies'));
    }
}
