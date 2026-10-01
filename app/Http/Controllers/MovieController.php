<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function movies()
    {
        return [
            1 => ['id' => 1, 'name' => 'Spiderman', 'genre' => 'Action', 'year' => '2001'],
            2 => ['id' => 2, 'name' => 'Batman', 'genre' => 'Action', 'year' => '2003'],
            3 => ['id' => 3, 'name' => 'Tarzan', 'genre' => 'Adventure', 'year' => '2000'],
        ];
    }

    public function index()
    {
        return view('movies.index', ['movies' => $this->movies()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $movies = $this->movies();

        return view('movies.show', ['movie' => $movies[2]]);
    }
}