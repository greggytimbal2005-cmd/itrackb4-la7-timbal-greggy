@extends('layouts.app')

@section('content')

<div class="container">

    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="mb-2">All Movies</h1>

            <p class="text-muted mb-0">
                Prepared by: Greggy F. Timbal
            </p>

        </div>


        <!-- ADD MOVIE BUTTON -->

        <a href="{{ route('movies.create') }}"
           class="btn btn-primary">

            + Add Movie

        </a>

    </div>


    <!-- FILTER BY GENRE -->

    <div class="mb-4">

        <h5 class="mb-3">Filter by Genre</h5>

        <div class="d-flex flex-wrap gap-2">

            @foreach($genres as $genre)

                <a href="{{ route('movies.index', ['genre' => $genre]) }}"
                   class="btn btn-outline-primary {{ $filterGenre === $genre ? 'active' : '' }}">

                    {{ $genre }}

                </a>

            @endforeach


            @if($filterGenre)

                <a href="{{ route('movies.index') }}"
                   class="btn btn-outline-secondary">

                    Clear

                </a>

            @endif

        </div>

    </div>


    <!-- FILTER BY YEAR -->

    <div class="mb-4">

        <h5 class="mb-3">Filter by Year</h5>

        <div class="d-flex flex-wrap gap-2">

            @foreach($years as $year)

                <a href="{{ route('movies.index', ['year' => $year]) }}"
                   class="btn btn-outline-primary {{ $filterYear == $year ? 'active' : '' }}">

                    {{ $year }}

                </a>

            @endforeach


            @if($filterYear)

                <a href="{{ route('movies.index') }}"
                   class="btn btn-outline-secondary">

                    Clear

                </a>

            @endif

        </div>

    </div>


    <!-- MOVIE TABLE -->

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

                @forelse($movies as $movie)

                    <tr>

                        <td>
                            {{ $movie['id'] }}
                        </td>


                        <td>

                            {{ $movie['title'] }}

                            @if($movie['featured'] ?? false)

                                <span class="badge bg-danger ms-2">
                                    Featured
                                </span>

                            @endif

                        </td>


                        <td>
                            {{ $movie['genre'] }}
                        </td>


                        <td>
                            {{ $movie['duration'] }} min
                        </td>


                        <td>
                            {{ $movie['year'] }}
                        </td>


                        <td>

                            <a href="{{ route('movies.show', $movie['id']) }}"
                               class="btn btn-sm btn-info text-white">

                                Details

                            </a>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No movies found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- MOVIE COUNT -->

    <p class="text-muted mt-3">

        Showing {{ $shownCount }} of {{ $totalCount }} movies

    </p>

</div>

@endsection