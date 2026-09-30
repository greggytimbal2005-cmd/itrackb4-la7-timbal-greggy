<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    // Private helper to read movies from JSON file
    private function readMovies()
    {
        $path = storage_path('movies.json');
        
        if (!file_exists($path)) {
            return [];
        }
        
        $json = file_get_contents($path);
        return json_decode($json, true) ?? [];
    }

    // List all movies with filtering
    public function index(Request $request)
    {
        $filterGenre = $request->query('genre', '');
        $filterYear = $request->query('year', '');

        $movies = collect($this->readMovies());

        if ($filterGenre) {
            $movies = $movies->where('genre', $filterGenre);
        }

        if ($filterYear) {
            $movies = $movies->where('year', (int)$filterYear);
        }

        $allMovies = $this->readMovies();

        // Get unique genres and years for filter buttons
        $genres = collect($allMovies)->pluck('genre')->unique()->sort();
        $years = collect($allMovies)->pluck('year')->unique()->sort();

        return view('movies.index', [
            'movies'       => $movies->values()->all(),
            'allMovies'    => $allMovies,
            'genres'       => $genres,
            'years'        => $years,
            'filterGenre'  => $filterGenre,
            'filterYear'   => $filterYear,
            'totalCount'   => count($this->readMovies()),
            'shownCount'   => count($movies),
        ]);
    }

    // Show details of a single movie
    public function show($id)
    {
        $movies = collect($this->readMovies());
        $movie  = $movies->firstWhere('id', (int) $id);

        if (!$movie) {
            abort(404, 'Movie not found.');
        }

        return view('movies.show', compact('movie'));
    }
}