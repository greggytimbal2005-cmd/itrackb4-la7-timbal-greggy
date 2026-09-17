<!DOCTYPE html>
<html>
<head>
    <title>Featured Movie</title>
</head>
<body>
    <h1>Featured Movie</h1>
    <h2>{{ $movie['title'] }}</h2>
    <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>
    <p><strong>Rating:</strong> {{ $movie['rating'] }}</p>
    <p><strong>Duration:</strong> {{ $movie['duration'] }}</p>
    <p><strong>Cast:</strong> {{ $movie['cast'] }}</p>
    <a href="{{ route('movies.index') }}">Back to all movies</a>
</body>
</html>