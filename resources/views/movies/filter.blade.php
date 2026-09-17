<!DOCTYPE html>
<html>
<head>
    <title>Filtered Movies</title>
</head>
<body>
    <h1>Movies{{ $value ? ' — ' . $value : '' }}</h1>
    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                — {{ $movie['genre'] }} ({{ $movie['duration'] }})
            </li>
        @endforeach
    </ul>
    <a href="{{ route('movies.index') }}">Back to all movies</a>
</body>
</html>