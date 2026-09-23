<nav class="mb-4">
    <ul class="list-unstyled">
        <li>
            @if (request()->is('movies*'))
                <a href="{{ route('movies.index') }}" class="btn btn-primary btn-sm active">📽️ Movies</a>
            @else
                <a href="{{ route('movies.index') }}" class="btn btn-primary btn-sm">📽️ Movies</a>
            @endif
        </li>
        
        <li class="mt-2">
            @if (request()->is('movies/featured'))
                <a href="{{ route('movies.featured') }}" class="btn btn-success btn-sm active">⭐ Featured</a>
            @else
                <a href="{{ route('movies.featured') }}" class="btn btn-success btn-sm">⭐ Featured</a>
            @endif
        </li>
    </ul>
</nav>