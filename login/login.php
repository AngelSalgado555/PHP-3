<?php
    $name = $pass = "";
    $termsError = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        include $_SERVER['DOCUMENT_ROOT'] . "/utils.php";
        $name = secure($_POST["name"]);
        $pass = secure($_POST["pass"]);
        $terms = $_POST["terms"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link src="../formulario.css" rel="stylesheet">

</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name"> Nombre: </label>
        <input type="text" placeholder="Nombre..." id="name" name="name">
        <br>

        <label for="pass"> Contraseña: </label>
        <input type="password" placeholder="Contraseña..." id="pass" name="pass">
        <br>

        <label for="terms"> Acepto los terminos: </label>
        <input type="checkbox" name="terms" id="terms">
        <br>

        <input type="submit" value="Entrar">




    </form>
</body>
</html>