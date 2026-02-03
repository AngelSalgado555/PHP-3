<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Journalist </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @include("components.header")
    <!--Formulario de creación de journalist:
        - nombre
        - apellidos
        - email
        - contraseña
        - repite la contraseña
    -->
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('journalist.update', $journalist->id) }}" method="post" >
                    @csrf
                    @method('put')
                    <!-- añade un campo hidden con un token imprescindible para que laravel le deje continuar -->
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input name="name" type="text" class="form-control" 
                        id="name" placeholder="Enter name" value="{{ $journalist->name }}">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellidos</label>
                        <input name="surname" type="text" class="form-control" 
                        id="surname" placeholder="Enter surname" value="{{ $journalist->surname }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" 
                        id="email" placeholder="Enter email" value="{{ $journalist->email }}">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Contraseña</label>
                        <input name="password" type="password" class="form-control" 
                        id="pass1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Repite la contraseña</label>
                        <input name="password2" type="password" class="form-control" id="pass2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>