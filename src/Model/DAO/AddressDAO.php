<?php


namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class AddressDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection($object);
        $stmt = $connection->prepare("INSERT INTO address VALUES(null,?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $object->public_place);
        $stmt->bindParam(2, $object->streetName);
        $stmt->bindParam(3, $object->neighborhood);
        $stmt->bindParam(4, $object->complement);
        $stmt->bindParam(5, $object->numberOfStreet);
        $stmt->bindParam(6, $object->zipCode);
        $stmt->bindParam(7, $object->city);
        return $stmt->execute();
    }
    public function findOne($id)
    {

    }
    public function findAll()
    {

    }
    public function update($object)
    {
        $connection = Connection::getConnection($object);
        $stmt = $connection->prepare('UPDATE address SET public_place=?, streetName=? , neighborhood=? , complement=?, numberOfStreet=?, zipCode=? , city=? WHERE idAddress=?;');
        $stmt->bindParam(1, $object->address->public_place);
        $stmt->bindParam(2, $object->address->streetName);
        $stmt->bindParam(3, $object->address->neighborhood);
        $stmt->bindParam(4, $object->address->complement);
        $stmt->bindParam(5, $object->address->numberOfStreet);
        $stmt->bindParam(6, $object->address->zipCode);
        $stmt->bindParam(7, $object->address->city);
        $stmt->bindParam(8, $object->address->idAddress);
        return $stmt->execute();
    }
    public function delete($id)
    {
        
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('DELETE FROM address WHERE idAddress= ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function findLastId()
    {
        $connection = Connection::getConnection();
        $result = $connection->query("SELECT max(idAddress) as id FROM address;");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function findId($idUser)
    {
        $connection = Connection::getConnection();
        $result = $connection->query("SELECT a.idAddress as 'id' from employee e inner join address a on e.idEmployee = idAddress where e.idEmployee = $idUser;");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}