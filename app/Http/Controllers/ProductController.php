<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Notebook',        'price' => 45.00,  'stock' => 120],
            ['name' => 'Ballpen',         'price' => 12.50,  'stock' => 350],
            ['name' => 'Bond Paper Pack', 'price' => 85.00,  'stock' => 45],
            ['name' => 'Pencil',          'price' => 10.00,  'stock' => 200],
            ['name' => 'Eraser',          'price' => 8.00,   'stock' => 180],
        ];

        return view('products.index', ['products' => $products]);
    }
}
