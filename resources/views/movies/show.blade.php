@extends('layouts.app')
@section('title', 'Movie Details')

@section('content')
<h1>{{ $movie['title'] }}</h1>

<div class="card">
    <div class="card-body">
        <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>
        <p><strong>Duration:</strong> {{ $movie['duration'] }} minutes</p>
        <p><strong>Year:</strong> {{ $movie['year'] }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $movie['description'] }}</p>
    </div>
</div>

<br>
<a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
@endsection