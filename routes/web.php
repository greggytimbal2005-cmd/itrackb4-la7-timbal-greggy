<?php
 
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
 
Route::get('/products', [ProductController::class, 'index']);
 