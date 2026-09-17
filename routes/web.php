<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies.index');
 
Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');
 
Route::get('/movies/filter/{cuisine?}', [MovieController::class, 'filter'])
    ->name('movies.filter');
 
Route::get('/movies/{id}', [MovieController::class, 'show'])
    ->name('movies.show');
 

 
