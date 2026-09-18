@extends('layouts.app')
@section('title', 'All Movies')

@section('content')
<h3>All Movies</h3>

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
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                {{ $movie['title'] }}
                @if ($movie['featured'])
                    <span class="badge bg-danger">Featured</span>
                @endif
            </td>
            <td>{{ $movie['genre'] }}</td>
            <td>{{ $movie['duration'] }} min</td>
            <td>{{ $movie['year'] }}</td>
            <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="btn btn-sm btn-info">Details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection