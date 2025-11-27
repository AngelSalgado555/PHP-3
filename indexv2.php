<?php
session_start();
//Si no ha llegado al indexv2 después del formulario de signupv2, que le devuelva a signupv2.php
var_dump(isset($_SESSION["origin"]));

//Compruebo la cookie:
$nameCookie = "";
if (isset($_COOKIE["logged"])){
    $nameCookie = $_COOKIE["logged"];
} else if (!isset($_SESSION["origin"]) or $_SESSION["origin"] != "signup") {
    header("Location: ./signup/signupv2.php");
    exit(); //Con esto termina el script, no se ejecuta nada más
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Biennnn!</p>
    <?php
    echo "<p>Tenías la cookie activada, $nameCookie</p>";
    var_dump($_POST);
    var_dump($_GET);
    var_dump($_SESSION);
    echo "<p>El nombre introducido era... </p>";

    //COnstruir un objeto User y mostarlo por pantalla
    require "User.php";
    $u = new User($name, $pass, $email, $age, $studies);

    ?>
</body>

</html>