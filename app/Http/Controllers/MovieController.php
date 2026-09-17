<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = $this->getMovies();
        return view('movies.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movies = $this->getMovies();
        if (!isset($movies[$id])) {
            abort(404);
        }
        return view('movies.show', ['movie' => $movies[$id]]);
    }

    public function featured()
    {
        $movies = $this->getMovies();
        $featuredMovie = ($movies[3]);

        return view('movies.featured', ['movie' => $featuredMovie]);
    }

    public function filter($value = null)
    {
        $movies = $this->getMovies();
        $filteredMovies = [];
        foreach ($movies as $id => $movie) {
            if ($value == null || $movie['genre'] == $value) {
                $filteredMovies[$id] = $movie;
            }
        }
        return view('movies.filter', ['movies' => $filteredMovies, 'value' => $value]);
    }

    private function getMovies()
    {
        $movies = [
            1 => ['id' => 1, 'title' => 'Tides of Manila', 'genre' => 'Drama',
                'rating' => 'PG-13', 'duration' => '118 minutes',
                'cast' => 'Isabela Cruz, Rafael Santos, Mia Torres'],
            2 => ['id' => 2, 'title' => 'Dawn Over Palawan', 'genre' => 'Adventure',
                'rating' => 'PG', 'duration' => '105 minutes',
                'cast' => 'Diego Ramos, Lila Reyes, Noel Bautista'],
            3 => ['id' => 3, 'title' => 'Leaves of Silence', 'genre' => 'Thriller',
                'rating' => 'R', 'duration' => '112 minutes',
                'cast' => 'Carla Mendoza, Victor Lim, Ana Villanueva'],
            4 => ['id' => 4, 'title' => 'Sugar and Static', 'genre' => 'Comedy',
                'rating' => 'PG', 'duration' => '97 minutes',
                'cast' => 'Ben Aquino, Trisha Navarro, Marco delos Santos'],
            5 => ['id' => 5, 'title' => 'The Long Harvest', 'genre' => 'Drama',
                'rating' => 'PG-13', 'duration' => '101 minutes',
                'cast' => 'Elena Ocampo, Joshua Cruz, Patricia Reyes'],
            6 => ['id' => 6, 'title' => 'Coconut Road', 'genre' => 'Action',
                'rating' => 'R', 'duration' => '129 minutes',
                'cast' => 'Kenji Ramos, Diana Salazar, Miguel Fernandez'],
            7 => ['id' => 7, 'title' => 'Embers of Lemongrass', 'genre' => 'Action',
                'rating' => 'R', 'duration' => '134 minutes',
                'cast' => 'Renz Villareal, Sofia Domingo, Adrian Cortez'],
        ];
        return $movies;
    }
}