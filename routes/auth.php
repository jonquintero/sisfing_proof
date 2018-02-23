<?php

//Routes that require authentication.

//Post
use App\Dependencies;

Route::get('dependencies/create', 'CreateDependenciesController@create')
    ->name('dependencies.create');

Route::post('dependencies/create', 'CreateDependenciesController@store')
    ->name('dependencies.store');

Route::get('dependencies/{dependency}', 'DependencyController@show')->name('dependencies.show')
        ->where('dependency','[0-9]+');

