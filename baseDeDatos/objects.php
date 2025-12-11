<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/baseDeDatos/Tree.php";

    //Conexión con la BD:
    try{
    $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default: 3306
    } catch (Exception $e) {
        echo "<p> Error en la conexión: {$e}</p>";
        echo "<p> No puedo continuar </p>";
        exit();
    }

    $t = new Tree(26.8, 47.9, "wood");
    $id = Tree::insert($t, $conn);
    // $sql = "DELETE FROM trees WHERE id = 23";
    // $conn -> query($sql);

    echo "<p> Se ha incertado un arbol con id $id </p>";

    $t = Tree::select(32, $conn);
    echo "<p> Árbol con select: $t</p>";

    $trees = Tree::selectAll($conn);
    foreach($trees as $t){
        echo "<p> $t </p>";
    }
    ?>
</body>
</html>