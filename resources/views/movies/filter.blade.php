@extends('layouts.app')
@section('title', 'Quick Movies')

@section('content')
<h3>⚡ Quick Movies (Under 150 minutes)</h3>

@if (count($movies) > 0)
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['duration'] }} min</td>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="btn btn-sm btn-info">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="alert alert-warning">No movies match this filter.</p>
@endif

<br>
<a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
