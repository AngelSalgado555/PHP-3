<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formulario de Recetas </title>
    <link rel="stylesheet" href="formrecipe.css">
</head>
<body>
    <div class="container">
        <form class="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <h2 class="titulo"><u> Formulario </u></h2>
            <label for="email"> Email: </label>
            <input type="text" id="email" name="email" placeholder="Email...">
            <br>

            <label for="name"> Nombre: </label>
            <input type="text" id="name" name="name" placeholder="Nombre...">
            <br>

            <label for="title"> Titulo de la Receta: </label>
            <input type="text" id="title" name="title" placeholder="Titulo de la receta...">
            <br>

            <label for="time"> Tiempo: </label>
            <input type="number" id="time" name="number">
            <br>

            <label for="vegana"> Vegana: </label>
            <input type="checkbox" id="vegana" name="vegana">

            <label for="vegetariana"> Vegetariana: </label>
            <input type="checkbox" id="vegetariana" name="vegetariana">

            <label for="carnivora"> Carnivora: </label>
            <input type="checkbox" id="carnivora" name="carnivora">
            <br>

            <input type="radio" id="con-gluten" name="gluten">
            <label for="gluten"> Con gluten </label>
            <br>

            <input type="radio" id="sin-gluten" name="gluten">
            <label for="gluten"> Sin gluten </label>
            <br>

            <label for="color"> Color: </label>
            <input type="color" id="color" name="color">

            <br>
            <input type="submit" name="enviar" value="Enviar">
            <br>
            <input type="reset" name="restablecer" value="Borrar">

        </form>
    </div>
</body>
</html>