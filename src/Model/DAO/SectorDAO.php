<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class SectorDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO sector VALUES(null,?,?);");
        $stmt->bindParam(1, $object->registration_employee);
        $stmt->bindParam(2, $object->salary);
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
        
    }
    public function delete($id)
    {
        
    }
    public function findId()
    {

    }
}