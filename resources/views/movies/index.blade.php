<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
</head>
<body>
    <h1>All Movies</h1>
    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                — {{ $movie['genre'] }} ({{ $movie['duration'] }})
            </li>
        @endforeach
    </ul>
</body>
</html>