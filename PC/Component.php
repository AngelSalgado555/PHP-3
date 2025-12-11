<?php

class Component{
    //Atributos y esas cosas 
    function __construct(
        private string $name,
        private string $brand,
        private string $model,
        private int $id = -1
    ){}

    public function __tostring(){
        $ret = "El id es: " . $this->id . ", el nombre es: " . $this->name . ", la marca es: " . $this->brand . ", y el modelo es: " . $this->model;
        return $ret;
    }


    public static function insert($c, $conn):int{
        $sql = "INSERT INTO components (name, brand, model) VALUES (\"$c->name\", \"$c->brand\", \"$c->model\")";
        $conn -> query($sql);
        $id = $conn -> insert_id;
        $c->id = $id;
        return $id;
    }

    public static function read($id, $conn): ?Component{
        $sql = "SELECT * FROM components WHERE id = $id";
        $row = $conn -> query($sql);
        if ($row->num_rows > 0){
            $row->fetch_assoc();
            $c = new Component($row["name"], $row["brand"], $row["model"], $row["id"]);
            return $c;
        } else {
            return null;
        }
    }

    public static function update($c, $conn): bool{
        
    }

    public static function delete($id, $conn): Component{

    }

    public static function readAll($id, $conn): Component{

    }

}