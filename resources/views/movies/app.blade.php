<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Movie List')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1> Movie List</h1>
    <p>Prepared by: Greggy F. Timbal</p>
    @include('partials._nav')
    @yield('content')
</body>
</html>