<?php

$name = $email = $pass = $pass2 = "";
$age = 0;
$studies = [];
$errors = false;
$passError = "";
    //Comprobaciones del formulario: 
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // echo "Hola";
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            if (isset($_POST["studies"])){
                $studies = $_POST["studies"];
                var_dump($studies);
            }

            if ($pass != $pass2){
                //Hay errores, muestro el formulario (sigo aquí)
                $errors = true;
                $passError = "Las contraseñas no coinciden";
                echo "Estoy en el if de contraseña";
            } else {
                //Me voy al index
                header("Location: indexv2.php");
            }
        }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signup </title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name"> Nombre: </label>
        <input type="text" id="name" name="name" value="<?= $name ?>">
        <br>

        <label for="email"> Email: </label>
        <input type="text" id="email" name="email" value="<?= $email ?>">
        <br>

        <label for="pass"> Contraseña: </label>
        <input type="password" id="pass" name="pass">
        <br>

        <laber for="pass"> Repite la contraseña: </laber>
        <input type="password" id="pass2" name="pass2">
        <br>

        <label for="age"> Edad: </label>
        <input type="number" id="age" name="age" value="<?= $age ?>">
        <br>
        <p class="passError"><?php echo $passError ?></p>


        <p> Cursos: </p>
        <input type="checkbox" id="daw" name="studies[]" value="DAW"
            <?php 
                if (in_array("DAW", $studies)){
                    echo "checked";
                }
            ?> 
        >
        <label for="daw"> DAW </label>
        <br>

        <input type="checkbox" id="dam" name="studies[]" value="DAM"
            <?php 
                if (in_array("DAM", $studies)){
                    echo "checked";
                }
            ?> 
        >
        <label for="dam"> DAM </label>
        <br>

        <input type="checkbox" id="ASIR" name="studies[]" value="ASIR"
            <?php 
                if (in_array("asir", $studies)){
                    echo "checked";
                }
            ?> 
        >
        <label for="asir"> ASIR </label>
        <br>

        <input type="submit" name="enviar" value="Enviar datos">
    </form>
</body>
</html>