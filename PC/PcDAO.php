<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/CoreDB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/Component.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/Pc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/ComponentDAO.php";

class PcDAO{
    /**
     * Create / insert.
     * Guarda en la bd un ordenador, y también guarda todos sus componentes
     * @param Pc $pc
     * @return bool true si lo ha insertado, false si no lo ha insertado.
     */
    private static function create($pc):bool{
        //todo
        $conn = CoreDB::getConnection();
        $sql = "INSERT into pcs (id, owner, brand, price)
            values(?, ?, ?, ?)";
        $ps = $conn->prepare($sql); /*prepared statement - sentencia preparada */

        /* Operación de binding: asignar valores a cada ? (es decir, asignar valores donde faltan) */

        /*Posibles valores de las interrogantes (?) s = string, f = float, i = int, d = double */
        $id = $pc->getId();
        $owner = $pc->getOwner();
        $brand = $pc->getBrand();
        $price = $pc->getPrice();

        $ps -> bind_param("sssd", $id, $owner, $brand, $price);

        /*Ejecuto la sentencia */
        $ret = $ps->execute();

        /*Guardo los componentes en la bd:  */
        foreach($pc -> getComponents() as $component){
            ComponentDAO::create($component);
        }

        // /*Cierro conexion */
        // $conn -> close();

        // return $ret;
    }

    /**
     * Read / select
     * Lee un pc de la bd con todos sus componentes
     * @param string $id
     * @return Pc Pc leído de la bd o null si no existe el id.
     */
    private static function read($id): ?Pc{
        //todo
        return null;
    }

    private static function update($pc): bool{
        //todo
        return false;
    }

    private static function delete($id): ?Pc{
        //todo
        return null;
    }

    private static function readAll(){
        //todo
    }

    /**
     * Lee de la bd los ordenadores con un precio entre un rango
     * @param mixed $min precio mínimo
     * @param mixed $max precio máximo
     * @return array Array con los pcs 
     */
    private static function readBetweenPrice($min, $max){
        //todo


    }
}