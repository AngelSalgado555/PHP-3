<?php
session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> Si no ha llegado a través del formulario le redirigimos al formrecipe. </p>
    <p> Aquí genero un objeto de la clase Recipe y lo imprimo con su to_string. </p>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/recipes/Recipe.php";
        $recipe1 = new Recipe("Hola", "ejemplo@gmail.com", "Cocinamos rico", "Verde", "Carnivora", "Si");

        echo $recipe1 -> __tostring();

        var_dump($_COOKIE);
    ?>
    <br>
    <a href="closesession.php"> Haz clic aquí para cerrar sesión y borrar cookies </a>
</body>
</html>