<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
</head>
<body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/singup/User.php";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            $studies = $_POST["studies"];
            $u = new User($name, $email, $pass, $age);
            echo "<p> $u </p>"; 
        } else {
            echo "<p> No puedes estar aquí </p>";
        }
    ?> 
</body>
</html>