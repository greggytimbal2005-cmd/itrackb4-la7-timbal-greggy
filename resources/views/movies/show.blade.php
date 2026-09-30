@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Movie Details -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>{{ $movie['title'] }}</h1>

        <a href="{{ route('movies.index') }}"
           class="btn btn-secondary">
            ← Back to Movies
        </a>

    </div>


    <div class="card">

        <div class="card-header bg-dark text-white">
            Movie Details
        </div>

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-3">
                    <strong>ID:</strong>
                </div>

                <div class="col-md-9">
                    {{ $movie['id'] }}
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-3">
                    <strong>Title:</strong>
                </div>

                <div class="col-md-9">
                    {{ $movie['title'] }}
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-3">
                    <strong>Genre:</strong>
                </div>

                <div class="col-md-9">
                    {{ $movie['genre'] }}
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-3">
                    <strong>Duration:</strong>
                </div>

                <div class="col-md-9">
                    {{ $movie['duration'] }} minutes
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-3">
                    <strong>Year:</strong>
                </div>

                <div class="col-md-9">
                    {{ $movie['year'] }}
                </div>

            </div>


            @if($movie['featured'] ?? false)

                <div class="row mb-3">

                    <div class="col-md-3">
                        <strong>Status:</strong>
                    </div>

                    <div class="col-md-9">

                        <span class="badge bg-danger">
                            Featured Movie
                        </span>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection