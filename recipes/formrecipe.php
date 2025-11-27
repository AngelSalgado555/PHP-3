<?php
include $_SERVER['DOCUMENT_ROOT'] . "/login/utils.php";
$name = $email = $title = $type = $gluten = "";
$typeError = $glutenError = "";
$errors = false;
//Comprobas si la petición de llegada es POST (formulario) o GET (enlace)
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recojo valores
    $name = secure($_POST["name"]);
    $email = secure($_POST["email"]);
    $title = secure($_POST["title"]);

    //Todo verificaciónde select 
    $type = secure($_POST["type"]);

    //Todo verificación de radio 
    if (isset($_POST["gluten"])){
        $gluten = secure($_POST["gluten"]);
    } else {
        $errors = true;
        $glutenError = "Tienes que seleccionar una opción de gluten ";
    }

    if (isset($_POST["cookie"])){
        //Quiero que dure 2 semanas 
        setcookie("receta", "valor de la cookie", time()+14*24*60*60);
    }


    if (!$errors){
        //Todo header o errores
        //Todo sesion
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["title"] = $title;
        $_SESSION["color"] = $color;
        $_SESSION["type"] = $type;
        $_SESSION["gluten"] = $gluten;
        $_SESSION["origin"] = "formulario";
 
        header("Location:  indexrecipe.php" );
    }
}

?>

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

            <select name="type" id="type">
                <option value="vegana" <?= $type == "vegana" ? "selected" : "" ?> > Vegana </option> 
                <option value="vegetariana" <?= $type == "vegetariana" ? "selected" : "" ?> > Vegetariana </option>
                <option value="carnivora" <?= $type == "carnivora" ? "selected" : "" ?> > Carnivora </option>
            </select>

            <input type="radio" id="con-gluten" name="gluten" value="gluten"
            <?= $gluten == "gluten" ? "checked" : "" ?>
            >
            <label for="gluten"> Con gluten </label>
            <br>

            <input type="radio" id="sin-gluten" name="gluten" value="glutenfree" 
            <?= $gluten == "glutenfree" ? "checked" : "" ?>
            >
            <label for="gluten"> Sin gluten </label>
            <br>
            <?php
                if ($glutenError != ""){
                    echo "<p class='errorGluten'> $glutenError </p>";
                }

            ?>

            <label for="color"> Color: </label>
            <input type="color" id="color" name="color">
            <br>
            
            <label for="cookie"> Quiero que me hagas una cookie </label>
            <input type="checkbox" name="cookie" id="cookie">
            <br>

            <input type="submit" name="enviar" value="Enviar">
            <br>
            <input type="reset" name="restablecer" value="Borrar">

        </form>
    </div>
</body>
</html>