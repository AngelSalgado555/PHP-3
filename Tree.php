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
        $sql = "INSERT INTO trees (price, height, material) VALUES ($tree->price, $tree->height, $tree->material)";
        $conn -> query($sql);
        $setID = $conn -> insert_id;
        return $setID;
    }
}

