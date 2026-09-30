<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movie Database</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body {
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

    </style>

</head>

<body>

    @include('partials._nav')


    <main class="py-4">

        {{-- SUCCESS MESSAGE --}}

        @if (session('success'))

            <div class="container mb-3">

                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>

                </div>

            </div>

        @endif


        {{-- PAGE CONTENT --}}

        @yield('content')

    </main>


    <footer class="text-center py-4 text-muted">

        <p>
            &copy; 2025 Movie Database. All rights reserved.
        </p>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>