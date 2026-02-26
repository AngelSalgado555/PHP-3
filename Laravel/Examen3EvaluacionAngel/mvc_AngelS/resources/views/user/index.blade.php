<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  

</head>
<body class="bg-light">
    @include('components.header')
    
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <h2 class="text-primary"> Usuarios y sus Eventos </h2>
            <a href="{{ route('event.create') }}" class="btn btn-success shadow-sm"> + Nuevo Evento </a>
        </div>

        @if (session('deleted'))
            <div class="alert alert-warning shadow-sm">
                {{ session('deleted') }}
            </div>
        @endif

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 text-truncate"> {{ $user -> name }}  con id:  {{ $user -> id }}</h5>
                        </div>

                        <div class="card-body p-2">
                            <p class="mb-1 text-muted"> Email: </p>
                            <p>{{ $user -> email }}</p>
                        </div>

                        <div class="card-body p-2">
                            <p class="mb-1 text-muted"> Edad: </p>
                            <p>{{ $user -> age }}</p>
                        </div>

                        <div class="card-footer bg-white border-top-0 d-flex gap-2 pb-3">
                            <form action="{{ route('user.delete', $user -> id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('¿Estas seguro de eliminar este usuario?')"> Eliminar </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>