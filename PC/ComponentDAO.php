<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/PC/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/PC/Component.php";

class ComponentDAO
{
    public static function create(Component $c, $pc_id = null): int
    {
        $conn = CoreDB::getConnection();
        /*$sql = "INSERT into components (name, brand, model) values (
            \"{$c->getName()}\",
            \"{$c->getBrand()}\",
            \"{$c->getModel()}\"
           )";
        $conn->query($sql);
        //El id se tiene que actualizar en el objeto
        $id = $conn->insert_id;
        $c->setId($id);
        $conn->close();
        return $id;*/
        //Lo voy a cambiar para utilizar prepared statements

        $sql = "INSERT INTO components (name, brand, model, pc_id) VALUES (?, ?, ?, ?);";
        $ps = $conn->prepare($sql);
        //Hago el bind (asignar valores a los ?)
        $name = $c->getName();
        $brand = $c -> getBrand();
        $model = $c -> getModel();
        
        $ps -> bind_param("ssss", $name, $brand, $model, $pc_id);

        //Ejecuto la query
        $ps -> execute();


        //Obtengo el id con el que se ha insertado 
        $id = $ps -> insert_id;
        $c -> setId($id);

        //Cerrar conexión
        $conn -> close();
        
        //Return
        return $id;
    }

    /**
     * Leo (select) de la bd por id
     * @param int $id
     * @return Component Devuelve el componente leído de la bd o null si no existe por ese id
     */
    public static function read(int $id): ?Component
    {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components where id = $id";
        //$id = "0; delete * from componentes where 1 = 1";
        //select * from components where id=0; delete * from componentes where 1 = 1;
        $result = $conn->query($sql);
        $conn->close();
        if (($row = $result->fetch_assoc()) != null) {
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
     * Actualiza el componente que le paso como parámetro (todos los atributos menos el id)
     * @param Component $c
     * @return bool
     */
    public static function update(Component $c): bool
    {
        $conn = CoreDB::getConnection();
        $sql = "UPDATE components set
                    name = \"{$c->getName()}\",
                    brand = \"{$c->getBrand()}\",
                    model = \"{$c->getModel()}\"
                    WHERE id = {$c->getId()}
                    ";
        // "UPDATE components set name="ram" brand="gte" model="tt3" where id=8";
        //echo "$sql";
        $conn->query($sql);
        $num = $conn->affected_rows;
        $conn->close();
        //Si he actualizado alguna (el número de filas afectadas es > 0) devuelvo true
        /*if ($num > 0) {
            return true;
        }
        return false;*/
        return ($num > 0);
    }

    /**
     * Devuelve el Component eliminado, o null si no existía un componente con ese id
     * @param int $id
     * @param mysqli $conn
     * @return void
     */
    public static function delete(int $id): Component
    {
        $c = ComponentDAO::read($id);
        $conn = CoreDB::getConnection();
        $sql = "DELETE from components where id = $id";
        $conn->query($sql); //Lo elimina
        $conn->close();
        return $c;
    }

    /**
     * Función que devuelve un array con todos los componentes leídos de la bd
     * o un array vacío si no hay ninguno
     * @return array
     */
    public static function readAll(): array
    {
        $arr = [];
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components";
        $result = $conn->query($sql);
        while (($row = $result->fetch_assoc()) != null) {
            $arr[] = new Component(
                $row["name"],
                $row["brand"],
                $row["model"],
                $row["id"]
            );
        }
        $conn->close();
        return $arr;
    }

    public static function selectByPcId($id){
        $components = [];
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM components WHERE pc_id = ?;";
        //Preparo statment 
        $ps = $conn -> prepare($sql);


        //Bind
        $ps -> bind_param("s", $id);
        $ps -> execute();

        //Lanzo
        $result = $ps -> get_result();
        while(($row = $result -> fetch_assoc()) != null){
            $components[] = new Component($row["name"], $row["brand"], $row["model"], $row["id"]);

        }   
        $conn -> close();
        //Obtengo resultados
        return $components;
    }
}