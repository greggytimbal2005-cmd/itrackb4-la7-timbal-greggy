@extends('layouts.app')
@section('title', 'Featured Movie')

@section('content')
<h3>⭐ Featured Movie</h3>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <h5 class="card-title">{{ $movie['title'] }}</h5>
        <p class="card-text"><strong>Genre:</strong> {{ $movie['genre'] }}</p>
        <p class="card-text"><strong>Duration:</strong> {{ $movie['duration'] }} minutes</p>
        <p class="card-text"><strong>Year:</strong> {{ $movie['year'] }}</p>
        <p class="card-text">{{ $movie['description'] }}</p>
        <a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="btn btn-primary">Full Details</a>
    </div>
</div>

<br>
<a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
@endsection