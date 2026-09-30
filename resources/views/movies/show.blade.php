@extends('layout')

@section('content')
<div class="container mt-5">
    <a href="{{ route('movies.index') }}" class="btn btn-secondary mb-4">← Back to Movies</a>

    <div class="card">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="mb-3">{{ $movie['title'] }}</h1>
                    
                    @if($movie['featured'] ?? false)
                        <span class="badge bg-danger mb-3">Featured Movie</span>
                    @endif

                    <p class="text-muted mb-4">{{ $movie['description'] ?? 'No description available.' }}</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Genre</h6>
                                <p class="lead">{{ $movie['genre'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted">Duration</h6>
                                <p class="lead">{{ $movie['duration'] }} minutes</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Release Year</h6>
                                <p class="lead">{{ $movie['year'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted">Movie ID</h6>
                                <p class="lead">#{{ $movie['id'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection