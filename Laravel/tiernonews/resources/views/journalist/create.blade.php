<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create a new Journalist </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    @include("components.header");
    <!-- Formulario de creación de journalist: 
        - Nombre
        - Apellidos
        - Email
        - contraseña
        - repite la contraseña
    -->

    @if ($errors -> any())
        @foreach ($errors->all() as $error)
            <p> {{ $error }}</p>
        @endforeach
    @endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0">Formulario de Creación de Journalist</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('jounalist.store') }}" method="POST">
                        @csrf
                        <!-- Añade un campo hidden con un token imprescindible para que laravel le deje continuar-->
                        <div class="mb-3">
                            <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="surname" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-4">
                            <label for="repite_password" class="form-label">Repite la contraseña</label>
                            <input type="password" class="form-control" id="repite_password" name="repite_password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Crear Periodista</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>