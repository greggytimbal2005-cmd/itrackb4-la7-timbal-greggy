@extends('layouts.app')
@section('title', 'All Movies')

@section('content')
<h3>🎬 All Movies</h3>

@if ($filterGenre || $filterYear)
    <div class="alert alert-info">
        <strong>Active Filters:</strong>
        @if ($filterGenre)
            <span class="badge bg-primary">Genre: {{ $filterGenre }}</span>
        @endif
        @if ($filterYear)
            <span class="badge bg-primary">Year: {{ $filterYear }}</span>
        @endif
        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-warning">Clear All</a>
    </div>
@endif

<div class="row mb-4">
    <div class="col-md-6">
        <h5>Filter by Genre</h5>
        <div class="btn-group" role="group">
            @foreach ($genres as $genre)
                @if ($filterGenre === $genre)
                    <button type="button" class="btn btn-primary active">{{ $genre }}</button>
                @else
                    <a href="{{ route('movies.index', ['genre' => $genre, 'year' => $filterYear]) }}" 
                       class="btn btn-outline-primary">{{ $genre }}</a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="col-md-6">
        <h5>Filter by Year</h5>
        <div class="btn-group" role="group">
            @foreach ($years as $year)
                @if ($filterYear == $year)
                    <button type="button" class="btn btn-primary active">{{ $year }}</button>
                @else
                    <a href="{{ route('movies.index', ['year' => $year, 'genre' => $filterGenre]) }}" 
                       class="btn btn-outline-primary">{{ $year }}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                {{ $movie['title'] }}
                @if ($movie['featured'])
                    <span class="badge bg-danger">⭐ Featured</span>
                @endif
            </td>
            <td>{{ $movie['genre'] }}</td>
            <td>{{ $movie['duration'] }} min</td>
            <td>{{ $movie['year'] }}</td>
            <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="btn btn-sm btn-info">Details</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">No movies match your filters</td>
        </tr>
        @endforelse
    </tbody>
</table>

<p class="text-muted mt-3">
    Showing {{ count($movies) }} of {{ count($allMovies) }} movies
</p>
@endsection