<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/User.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/CoreDB.php";

class UserDAO{
    public static function create($user){
        //Conexión 
        $conn = CoreDB::getConnection();

        //Sentencia preparada

        //Bind

        //Lanzamiento de consulta


        //Recupera id

        //Cierra conexion
        

        $conn -> close();
        return;
    }

    public static function readPassword($id){

    }
}