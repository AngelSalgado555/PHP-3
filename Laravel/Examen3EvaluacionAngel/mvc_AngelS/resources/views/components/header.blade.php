<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary border-0" href="{{ route('user.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-info border-0" href="{{ route('event.create') }}"> Crear Evento</a>
                </li>
            </ul>
        </div>
    </nav>
</header>