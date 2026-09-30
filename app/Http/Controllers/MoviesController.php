<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{

    private function readMovies()
    {
        $path = storage_path('app/movies.json');

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);

        $movies = json_decode($json, true);

        if (!is_array($movies)) {
            return [];
        }

        return $movies;
    }

    private function writeMovies(array $movies)
    {
        $path = storage_path('app/movies.json');

        file_put_contents(
            $path,
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $filterGenre = $request->query('genre', '');
        $filterYear = $request->query('year', '');

        $allMovies = $this->readMovies();

        $movies = collect($allMovies);


        if ($filterGenre !== '') {
            $movies = $movies->where('genre', $filterGenre);
        }


        if ($filterYear !== '') {
            $movies = $movies->where('year', (int) $filterYear);
        }


        $genres = collect($allMovies)
            ->pluck('genre')
            ->unique()
            ->sort()
            ->values();


        $years = collect($allMovies)
            ->pluck('year')
            ->unique()
            ->sort()
            ->values();


        return view('movies.index', [

            'movies' => $movies->values()->all(),

            'allMovies' => $allMovies,

            'genres' => $genres,

            'years' => $years,

            'filterGenre' => $filterGenre,

            'filterYear' => $filterYear,

            'totalCount' => count($allMovies),

            'shownCount' => $movies->count(),

        ]);
    }


    public function show($id)
    {
        $movies = collect($this->readMovies());

        $movie = $movies->firstWhere('id', (int) $id);

        if (!$movie) {
            abort(404, 'Movie not found.');
        }

        return view('movies.show', [
            'movie' => $movie
        ]);
    }



    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {


        $validated = $request->validate([

            'title' => 'required|string|max:100',

            'genre' => 'required|in:Action,Comedy,Drama,Horror,Romance,Sci-Fi',

            'duration' => 'required|numeric|min:1|max:500',

            'year' => 'required|integer|min:1900|max:2026',

            'featured' => 'required|in:0,1',

        ]);


        $movies = $this->readMovies();


        $newId = 1;

        if (count($movies) > 0) {

            $ids = array_column($movies, 'id');

            $newId = max($ids) + 1;
        }


        $newMovie = [

            'id' => $newId,

            'title' => $validated['title'],

            'genre' => $validated['genre'],

            'duration' => (int) $validated['duration'],

            'year' => (int) $validated['year'],

            'featured' => (bool) $validated['featured'],

        ];

        $movies[] = $newMovie;

        $this->writeMovies($movies);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully!');
    }
}