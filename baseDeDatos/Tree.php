<?php

class Tree{
    function __construct(
        private float $price, 
        private float $height, 
        private string $material,
        private int $id = -1
    ){}

    /**
     * Inserta en la base de datos el árbol
     * @param Tree $tree árbol a insertar en la bd
     * @param mysqli $conn conexión con la bd 
     * @return int id con el que se ha insertado en la bd
     */
    static function insert(Tree $tree, mysqli $conn):int{
        $sql = "INSERT INTO trees (price, height, material) VALUES (\"$tree->price\", \"$tree->height\", \"$tree->material\")";
        $conn -> query($sql);
        $id = $conn -> insert_id;
        $tree->id = $id;
        return $id;
    }

    static function select($id, $conn): ?Tree{
        $sql = "SELECT * FROM trees WHERE id = $id";
        $row = $conn -> query($sql); //Devuelve un mysqli_result
        if ($row->num_rows > 0){
            $arr = $row->fetch_assoc();
            $t = new Tree($arr["price"], $arr["height"], $arr["material"], $arr["id"]);
            return $t;
        } else {
            return null;
        }

    }

    static function delete($id, $conn): bool{
        $sql = "DELETE FROM trees WHERE id = $id";
        $conn -> query($sql); //Aquí lanzo la consulta para borrar el árbol
        $rows = $conn->affected_rows; //Filas afectadas por esta consulta
        if ($rows > 0){
            return true;
        }
        return false;
    }   

    static function selectAll ($conn): array{
        $sql = "SELECT * FROM trees";
        $rows = $conn -> query($sql);
        while (($row = $rows->fetch_assoc()) != null){
            $trees[] = new Tree($row["price"], $row["height"], $row["material"], $row["id"]);
        }
        return $trees;
    }
}

