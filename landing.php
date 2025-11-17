<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formularios de PHP </title>
</head>
<body>
    <?php 
        var_dump($_POST);
    ?>
    <?php if ($_SERVER['REQUEST_METHOD'] == "GET") : ?>
        <p> He llegado a través de una opetición GET </p>
        <p> El nombre es: <?php echo $_GET["name"] ?> </p>
        <p> La contraseña es: <?php echo $_GET["pass"] ?> </p>
    <?php endif ?>

    <?php if ($_SERVER['REQUEST_METHOD'] == "POST") : ?>
        <p> He llegado a través de una petición POST </p>
        <p> El nombre es: <?php echo $_POST["name"] ?> </p> 
        <p> La contraseña es: <?php echo $_POST["pass"] ?> </p>
        <?php if (isset($_POST["gender"])): ?>
            <p> Tu género es: <?= $_POST["gender"] ?> </p>
        <?php else: ?>
            <p> No has elegido ningún genero </p> 
        <?php endif ?>
    <?php endif ?>

</body>
</html>