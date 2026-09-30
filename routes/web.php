<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

Route::controller(MoviesController::class)->group(function () {
    // List all movies with filtering options
    Route::get('/movies', 'index')->name('movies.index');
    
    // Show individual movie details
    Route::get('/movies/{id}', 'show')->name('movies.show');
});

// Redirect root to movies page
Route::redirect('/', '/movies');