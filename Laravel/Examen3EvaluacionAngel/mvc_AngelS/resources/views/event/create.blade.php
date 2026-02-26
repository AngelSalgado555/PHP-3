<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear un evento </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    @include('components.header')

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
                    <form action="{{ route('event.create') }}" method="POST">
                        @csrf
                        <!-- Añade un campo hidden con un token imprescindible para que laravel le deje continuar-->
                        <div class="mb-3">
                            <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                            <input type="text" id="nombre" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                            @error('name') <small class="text-danger"> {{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Descripción: </label>
                            <input type="text" id="description" name="description" 
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{ old('description') }}">
                            @error('description') <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Duración: </label>
                            <input type="number" class="form-control" id="duration" name="duration">
                        </div>

                        <div class="mb-3">
                            <label for="visibility" class="form-label">Visibilidad: </label>
                            <input type="radio" class="form-control" id="visibility" name="visibility" >
                        </div>

                        <div class="mb-4">
                            <label for="usuarios" class="form-label">Usario del evento: </label>
                            <select name="usuarios" id="usuarios">
                                @foreach ($users as $user)
                                    <option> {{ $user -> name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Crear Evento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>