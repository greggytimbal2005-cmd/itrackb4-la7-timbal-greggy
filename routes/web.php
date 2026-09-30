<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


Route::get('/movies', [MoviesController::class, 'index'])
    ->name('movies.index');


Route::get('/movies/create', [MoviesController::class, 'create'])
    ->name('movies.create');


Route::post('/movies', [MoviesController::class, 'store'])
    ->name('movies.store');


Route::get('/movies/{id}', [MoviesController::class, 'show'])
    ->name('movies.show');