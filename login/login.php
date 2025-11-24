<?php
session_start(); //Voy a utilizar la variable superglobal $_SESSION

$name = $pass = "";
$nameError = "";
$termsError = "";
$errores = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        include $_SERVER['DOCUMENT_ROOT'] . "/login/utils.php";
        $name = secure($_POST["name"]);
        // var_dump($name);
        $pass = secure($_POST["pass"]);
        // var_dump($_POST);

        if (isset($_POST["terms"])){
            $terms = $_POST["terms"];
        } else{
            $errores = true;
            $termsError = "Es obligatorio aceptar los términos";
        }

        if (strlen($name)< 3 || strlen($name) > 15) {
            $nameError = "La longitud entre 3 y 15";
            $errores = true;
        }

        if (!$errores){
            //Todos sesión y a index
            $_SESSION["name"] = $name;
            $_SESSION["pass"] = $pass;
            $_SESSION["origin"] = "login"; //Viene bien para saber de donde se viene
            $_SESSION["terms"] = $terms;
            $_SESSION["test"] = 45.9; //Este no vale para nada
            //Redirijo: 
            header("Location: ../indexv2.php");
            //Termino el script 
            exit();

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../formulario.css" >

</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name"> Nombre: </label>
        <input type="text" placeholder="Nombre..." id="name" name="name" value="<?= $name ?>" minlength="3"  maxlength="15" >
        <br>

        <label for="pass"> Contraseña: </label>
        <input type="password" placeholder="Contraseña..." id="pass" name="pass">
        <br>

        <input type="checkbox" name="terms" id="terms" 
            class="<?=  empty($termsError) ? '' : 'checkError' ?>">
        <label for="terms"> Acepto los terminos: </label> 
        <?= "<p class='error'>" . $termsError . "</p>" ?>
        <br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>