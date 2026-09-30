@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <h1 class="mb-2">Movie List</h1>
    <p class="text-muted mb-4">Prepared by: Greggy F. Timbal</p>

    <!-- All Movies Section -->
    <div class="d-flex align-items-center mb-4">
        <span style="font-size: 24px; margin-right: 10px;">🎬</span>
        <h2 class="mb-0">All Movies</h2>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <!-- Filter by Genre -->
        <div class="col-md-6">
            <h5 class="mb-3">Filter by Genre</h5>
            <div class="d-flex flex-wrap gap-2 mb-4">
                @foreach($genres as $genre)
                    <a href="{{ route('movies.index', ['genre' => $genre]) }}" 
                       class="btn btn-outline-primary {{ $filterGenre === $genre ? 'active' : '' }}">
                        {{ $genre }}
                    </a>
                @endforeach
                @if($filterGenre)
                    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </div>

        <!-- Filter by Year -->
        <div class="col-md-6">
            <h5 class="mb-3">Filter by Year</h5>
            <div class="d-flex flex-wrap gap-2 mb-4">
                @foreach($years as $year)
                    <a href="{{ route('movies.index', ['year' => $year]) }}" 
                       class="btn btn-outline-primary {{ $filterYear == $year ? 'active' : '' }}">
                        {{ $year }}
                    </a>
                @endforeach
                @if($filterYear)
                    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Movies Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
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
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie['id'] }}</td>
                        <td>
                            {{ $movie['title'] }}
                            @if($movie['featured'] ?? false)
                                <span class="badge bg-danger ms-2">Featured</span>
                            @endif
                        </td>
                        <td>{{ $movie['genre'] }}</td>
                        <td>{{ $movie['duration'] }} min</td>
                        <td>{{ $movie['year'] }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-sm btn-info text-white">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer Count -->
    <p class="text-muted mt-3">
        Showing {{ $shownCount }} of {{ $totalCount }} movies
    </p>
</div>

<style>
    .btn-outline-primary.active {
        background-color: #0d6efd;
        color: white;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        vertical-align: middle;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>
@endsection