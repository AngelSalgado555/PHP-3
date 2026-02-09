<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear un artículo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    @include("components.header");
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h5 class="mb-0"> Formulario de creación de artículo </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('article.store') }}" method="POST">
                            <div class="mb-3">
                                <label for="titulo" class="form-label font-weight-bold">Titúlo: </label>
                                <input type="text" class="form-control" id="titulo">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label"> Content: </label>
                                <input type="text" class="form-control" id="content">
                            </div>

                            <div class="mb-3">
                                <label for="readers" class="form-control"> Readers: </label>
                                <input type="text" class="form-control" id="readers">
                            </div>

                            <button type="button" class="btn btn-primary"> Crear Artículo </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>