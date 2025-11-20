<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
</head>
<body>
    <h3> En esta página: </h3>
    <ol> 
        <li> Se comprueba que ha llega a través de POST</li>
        <li> Haz var_dump($_POST)</li>
        <li> Se instancia </li>
    </ol>
    <?php
    require $_SERVER['DOCUMENT_ROOT'] . "/PHP-3/singup/User.php";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            var_dump($_POST);
            if (empty($age)){
                $age = 0;
            }
            $studeies = [];
            if (isset($_POST["studies"])){
                $studies = $_POST["studies"];
            }
            $u = new User($name, $email, $pass, $age, $studies);
            echo "<p> $u </p>"; 
        } else {
            echo "<p> No puedes estar aquí </p>";
        }
    ?> 
</body>
</html>