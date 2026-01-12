<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/User.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/CoreDB.php";

class UserDAO{
    /**
     * Summary of create
     * @param User $user usuario a insertar, tiene contraseña clara en sus parametros y también se hace la hasheada
     * @return int con el id del usuario insertado
     */
    public static function create($user){
        //Conexión
        $conn = CoreDB::getConnection();

        //Sentencia preparada
        $sql = "INSERT INTO users (name, password) VALUES (?, ?);";
        $ps = $conn -> prepare($sql);
        
        //Bind (la tenemos que hashear)
        $name = $user -> getName();
        $password = $user -> getPassword(); //Contraseña sin hashear 
        $passHash = password_hash($password, PASSWORD_DEFAULT); //Contraseña hasheada
        $ps -> bind_param("ss", $name, $passHash);
        
        //Lanzamiento de consulta
        $ps -> execute();

        //Recupera id
        $id = $ps -> insert_id;
        $user -> setId($id);

        //Cierra conexion
        $conn -> close();
        return $id;
    }

    /**
     * Verifica si una contraseña corresponde con la contraseña de eses nombre en la BD
     * @param mixed $name nombre del usuario
     * @param mixed $password contraseña introducida que será verificada con la que está guardada en la BD
     * @return int 1 si coinciden, -1 si no existe el user, -2 si existe el user pero la contraseña no es correcta 
     */ 
    public static function verifyPassword($name, $password): int{
        //Conexión
        $conn = CoreDB::getConnection();

        //Sentencia preparada
        $sql = "SELECT * FROM users WHERE name = ?;";

        //Prepare Statment
        $ps = $conn -> prepare($sql);

        //Bind
        $ps -> bind_param("s", $name);
        $ps -> execute();

        $result = $ps -> get_result();
        $row = $result -> fetch_assoc();

        $ret = 0;
        if ($row != null){
            $passBD = $row["password"];
            if (password_verify($password, $passBD)){
                $ret = 1; //User y contraseña existen y son correctas
            } else {
                $ret = -2; //User existe pero la contraseña es incorrecta
            }
        } else {
            $ret = -1; //El select noha devuelto ningún resultado, por tanto no existe el user 
        }
    
        $conn -> close();
        return $ret;
    }
}