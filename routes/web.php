<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.list');  // ADD THIS LINE
Route::get('/movies/featured', [MoviesController::class, 'featured'])->name('movies.featured');
Route::get('/movies/filter', [MoviesController::class, 'filter'])->name('movies.filter');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');