<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Articulos </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    @include("components.header")

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2> Articulos Registrados </h2>
            <a href="{{ route('article.create') }}" class="btn btn-success shadow-sm"> + Nuevo Articulo </a>
        </div>

        @if(session('deleted'))
            <div class="alert alert-warning shadow-sm">
                {{ session('deleted') }}
            </div>
        @endif

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 text-truncate">{{ $article -> title }}</h5>
                        </div>
                        <div class="card-body p-3">
                            <p class="mb-1 text-muted"><strong>ID</strong></p>
                            <p>{{ $article -> id }}</p>
                        </div>

                        <div class="card-body p-3">
                            <p class="mb-1 text-muted"><strong>Content</strong></p>
                            <p>{{ $article -> content }}</p>
                        </div>

                        <div class="card-body p-3">
                            <p class="mb-1 text-muted"><strong>Readers</strong></p>
                            <p>{{ $article -> readers }}</p>
                        </div>

                        <div class="card-body p-3">
                            <p class="mb-1 text-muted"><strong>Journalist ID </strong></p>
                            <p>{{ $article -> journalist_id }}</p>
                        </div>

                        <div class="card-footer bg-white border-top-0 d-flex gap-2 pb-3">
                            <a href="{{ route('article.edit', $article) }}" class="btn btn-sm btn-outline-primary flex-grow-1">
                                Editar
                            </a>

                            <form action="{{ route('article.destroy', $article) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Estas seguro de borrar este articulo?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>