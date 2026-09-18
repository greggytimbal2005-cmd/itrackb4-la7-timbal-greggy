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
                'description' => 'The Avatar saga continues with groundbreaking visual effects and deeper lore of Pandora\'s indigenous Na\'vi culture.',
                'duration'    => 178,
                'genre'       => 'Sci-Fi',
                'featured'    => true,
                'year'        => 2025,
            ],
            [
                'id'          => 2,
                'title'       => 'Mission: Impossible – Legacy Reborn',
                'description' => 'Tom Cruise returns in the next evolution of the spy franchise with cutting-edge stunts and mystery-laden plotlines.',
                'duration'    => 162,
                'genre'       => 'Action',
                'featured'    => false,
                'year'        => 2025,
            ],
            [
                'id'          => 3,
                'title'       => 'Wicked: For Good',
                'description' => 'The second part of the highly anticipated film adaptation of the Broadway musical, a major musical event.',
                'duration'    => 165,
                'genre'       => 'Musical',
                'featured'    => false,
                'year'        => 2025,
            ],
            [
                'id'          => 4,
                'title'       => 'Quantum Requiem',
                'description' => 'A mind-bending sci-fi thriller about a physicist harnessing quantum anomalies to travel across timelines.',
                'duration'    => 155,
                'genre'       => 'Sci-Fi',
                'featured'    => false,
                'year'        => 2026,
            ],
            [
                'id'          => 5,
                'title'       => 'The Supergirl Movie',
                'description' => 'Part of the new DC Universe slate, introducing a fresh take on the iconic Kryptonian hero, Kara Zor-El.',
                'duration'    => 145,
                'genre'       => 'Action',
                'featured'    => false,
                'year'        => 2026,
            ],
        ];
    }

    public function index()
    {
        $movies = $this->movies();
        return view('movies.index', compact('movies'));
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

    public function filter()
    {
        $movies = collect($this->movies())
            ->filter(fn ($movie) => $movie['duration'] < 150)
            ->values()
            ->all();

        return view('movies.filter', compact('movies'));
    }
}