<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie['name'] }} - Details</title>
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
        .detail-card { max-width: 600px; margin-top: 20px; }
        .detail-header { background: #1a1a1a; color: #fff; padding: 14px; font-weight: bold; margin-bottom: 12px; }
        .detail-row { padding: 12px; border-bottom: 1px solid #eee; background: #f9f9f9; }
        .btn { display: inline-block; padding: 10px 16px; margin-top: 20px; background: #6c757d; color: #fff; text-decoration: none; border-radius: 4px; }
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

    <h2>Movie Details</h2>

    <div class="detail-card">
        <div class="detail-header">Title: {{ $movie['name'] }}</div>
        <div class="detail-row">Genre: {{ $movie['genre'] }}</div>
        <div class="detail-row">Year: {{ $movie['year'] }}</div>
    </div>

    <a href="{{ route('movies.index') }}" class="btn">Back to List</a>
</body>
</html>