<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-3/PC/CoreDB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-3/PC/Component.php";
class ComponentDAO{

    public static function create(Component $c): int{
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO components (name, brand, model) VALUES ( 
        \"{$c->getName()}\",
        \"{$c->getBrand()}\",
        \"{$c->getModel()}\"
        )";

        $conn -> query($sql);
        //El id tiene que ser actualizado con el objeto 
        $id = $conn -> insert_id;
        $c->setId($id);
        return $id;

    }
    public function __tostring(){
        $ret = "El id es: " . $this->id . ", el nombre es: " . $this->name . ", la marca es: " . $this->brand . ", y el modelo es: " . $this->model;
        return $ret;
    }


    
    public static function insert($c):int{
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO components (name, brand, model) VALUES (\"{$c->getName()}\", \"{$c->getBrand()}\", \"{$c->getModel()}\")";
        $conn -> query($sql);
        $id = $conn -> insert_id;
        $c->id = $id;
        return $id;
    }

    /**
     * Leo (select) de la bd por id 
     * @param int $id
     * @return Component El componente leído de la bd o null si no existe por ese id
     */
    public static function read(int $id): ?Component{
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM components WHERE id = $id";
        $result = $conn -> query($sql);
        $conn -> close();
        if (($row = $result -> fetch_assoc()) != null ){
            return new Component(
                $row["name"],
                $row["brand"],
                $row["model"],
                $row["id"]
            );
        }
        return null;
    }

    /**
     * Actualiza el componente que el paso como parámetro (todos los atributos menos el id)
     * @param Component $c
     * @return bool
     */
    public static function update(Component $c): bool{
        $conn = CoreDB::getConnection();
        $sql = "UPDATE components set 
        name = \"{$c->getName()}\", 
        brand = \"{$c->getBrand()}\",
        model = \"{$c->getModel()}\"
        WHERE id = {$c->getId()}
        ";
        //echo "$sql";
        $conn -> query($sql);
        $num = $conn ->affected_rows;
        $conn -> close();
        //Si he actualizado alguna (el número de filas afectadas es > 0) devuelvo true
        // if ($num >0){
        //     return true;
        // }
        // return false;
        return ($num > 0);
    }

    /**
     * Devuelve el Component eliminado , o null si no existía un componente con ese id
     * @param int $id
     * @param mysqli $conn
     * @return void
     */
    public static function delete(int $id): Component{
        $c = ComponentDAO::read($id);
        $conn = CoreDB::getConnection();
        $sql = "DELETE FROM components WHERE id = $id";
        $conn -> query($sql);
        $conn -> close();
        return $c;

    }

    /**
     * Función que devuelve un array con todos los componentes leídos de la bd 
     * o un array vacío s i no hay ninguno 
     * @return array
     */
    public static function readAll(): array{
        $arr = [];
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM components";
        $result = $conn -> query($sql);
        while (($row = $result -> fetch_assoc()) != null){
            $arr[] = new Component(
                $row["name"],
                $row["brand"],
                $row["model"], 
                $row["id"]
            );
        }
        $conn -> close();
        return $arr;
    }

}