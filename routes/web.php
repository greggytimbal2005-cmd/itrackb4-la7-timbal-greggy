<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{genre}', [MovieController::class, 'filter'])
    ->name('movies.filter');

Route::resource('movies', MovieController::class)
    ->only(['index', 'show']);