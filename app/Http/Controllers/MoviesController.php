<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    private function movies()
    {
        return [
            [
                'id'          => 1,
                'title'       => 'Avatar: Aid of Passage',
                'description' => 'The Avatar saga continues with groundbreaking visual effects.',
                'duration'    => 178,
                'genre'       => 'Sci-Fi',
                'featured'    => true,
                'year'        => 2025,
            ],
            [
                'id'          => 2,
                'title'       => 'Mission: Impossible – Legacy Reborn',
                'description' => 'Tom Cruise returns in the next evolution of the spy franchise.',
                'duration'    => 162,
                'genre'       => 'Action',
                'featured'    => false,
                'year'        => 2025,
            ],
            [
                'id'          => 3,
                'title'       => 'Wicked: For Good',
                'description' => 'The second part of the film adaptation of the Broadway musical.',
                'duration'    => 165,
                'genre'       => 'Musical',
                'featured'    => false,
                'year'        => 2025,
            ],
            [
                'id'          => 4,
                'title'       => 'Quantum Requiem',
                'description' => 'A mind-bending sci-fi thriller about quantum anomalies.',
                'duration'    => 155,
                'genre'       => 'Sci-Fi',
                'featured'    => false,
                'year'        => 2026,
            ],
            [
                'id'          => 5,
                'title'       => 'The Supergirl Movie',
                'description' => 'A fresh take on the iconic Kryptonian hero, Kara Zor-El.',
                'duration'    => 145,
                'genre'       => 'Action',
                'featured'    => false,
                'year'        => 2026,
            ],
        ];
    }

    public function index(Request $request)
    {
        $filterGenre = $request->query('genre', '');
        $filterYear = $request->query('year', '');

        $movies = collect($this->movies());

        if ($filterGenre) {
            $movies = $movies->where('genre', $filterGenre);
        }

        if ($filterYear) {
            $movies = $movies->where('year', (int)$filterYear);
        }

        $allMovies = $this->movies();

        $genres = collect($allMovies)->pluck('genre')->unique()->sort();
        $years = collect($allMovies)->pluck('year')->unique()->sort();

        return view('movies.index', [
            'movies'       => $movies->values()->all(),
            'allMovies'    => $allMovies,
            'genres'       => $genres,
            'years'        => $years,
            'filterGenre'  => $filterGenre,
            'filterYear'   => $filterYear,
        ]);
    }

    public function show($id)
    {
        $movies = collect($this->movies());
        $movie  = $movies->firstWhere('id', (int) $id);

        if (!$movie) {
            abort(404, 'Movie not found.');
        }

        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movies = collect($this->movies());
        $movie  = $movies->firstWhere('featured', true) ?? $movies->first();

        return view('movies.featured', compact('movie'));
    }
}