<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "Sandia4you";
    $db = "shop";
    $port = 3306; 

    //Conectamos 
    $conn = new mysqli($host, $user, $pass, $db, $port);

    //Creamos una tabla 
    $sql = "CREATE TABLE IF NOT EXISTS trees (
        id int AUTO_INCREMENT PRIMARY KEY,
        price float NOT NULL,
        height float, 
        material varchar(255)
        )";
    /*
    if ($conn -> query($sql)){
        echo "<p> Tabal Creada </p>";
    } else {
        echo "<p> Error en la consulta CREATE TABLE </p>";
    }
    */

    try{
        $conn -> query($sql);
    } catch (Exception $e){
        echo "<p> Excepción: {$e -> getMessage()}</p>";
    }


    //INSERT Insertamos un árbol 
    // $sql = "INSERT INTO trees (price, height, material) VALUES (1, 1.50, 'plastic');";
    // $conn -> query($sql);
    // //Recupero el id con el qu se ha insertado: 
    // $id = $conn -> insert_id;
    // echo "<p> El árbol se ha insertado con id: {$id}</p>";

    //DELETE Borramos un elemento arbol con el id = 4
    $sql = "DELETE FROM trees WHERE id = 4";
    $conn -> query($sql);

    //UPDATE Update 
    $sql = "UPDATE trees SET 
        material = 'iron'
        WHERE id = 5";

    $conn -> query($sql);
    $filasAfectadas = $conn -> affected_rows;
    echo "<p> Se han actualizado $filasAfectadas filas </p>";

    $sql = "DELETE FROM trees WHERE id = 18";
    $conn -> query($sql);

    //SELECT 
    $sql = "SELECT * FROM trees";
    $result = $conn -> query($sql);

    $row = $result -> fetch_assoc(); //$row contien un array asociativo de la primera fila
    //fetch_assoc devuelve nll cuando no hay más resultados
    $cant = $result -> num_rows;

    echo "<p> Ha habido $cant resultados </p>";

    echo "<table border='1'>";
    while($row != null){
        echo "<tr>";
        //Imprimo resultados 
        echo "<td>{$row['id']} - {$row['price']} - {$row['height']} - {$row['material']}</td>";
        //Cojo la siguiente fila
        $row = $result -> fetch_assoc();
        echo "</tr>";
    }
    echo "</table>";

    //Otra forma de hacer el bucle 
    $sql = "SELECT * FROM trees"; 
    $result = $conn -> query($sql);
    while (($row = $result -> fetch_assoc()) != null){
        echo "<p> {$row['id']} - {$row['price']} - {$row['height']} - {$row['material']} </p>";
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Tree.php";
    
    $t = new Tree(20.0, 1.8, "diamante");

    
    ?>
</body>
</html>