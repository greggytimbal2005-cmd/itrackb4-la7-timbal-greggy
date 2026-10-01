<!DOCTYPE html>
<html>
<head>
    <title>Movies List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { font-size: 2.5rem; margin-bottom: 4px; }
        .prepared-by { color: #666; margin-bottom: 20px; }
        .nav-buttons { margin: 20px 0; }
        .nav-buttons a {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            border: 1px solid #3b82f6;
            border-radius: 4px;
            color: #3b82f6;
            text-decoration: none;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1a1a1a; color: #fff; text-align: left; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background: #f5f5f5; }
        .movie-link {
            display: inline-block;
            border: 1px solid #3b82f6;
            border-radius: 4px;
            padding: 4px 8px;
            color: #3b82f6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Movie Flex</h1>
    <p class="prepared-by">Prepared by: Your Name</p>

    <div class="nav-buttons">
        <a href="{{ route('movies.index') }}">Movie List</a>
        <a href="{{ route('movies.featured') }}">Featured Movie</a>
        <a href="{{ route('movies.filter', 'all') }}">Filter List</a>
    </div>

    <h2>My Movie List</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie['id'] }}</td>
                    <td>
                        <a class="movie-link" href="{{ route('movies.show', $movie['id']) }}">
                            {{ $movie['name'] }}
                        </a>
                    </td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>