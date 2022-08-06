<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ClientDAO implements DAO
{
    //Cadastrar Cliente
    public function insert($object)
    {
       $connection = Connection::getConnection();
       $stmt = $connection->prepare("INSERT INTO client VALUES(null,?,?,?,?,?,?,null);");
       $stmt->bindParam(1, $object->login_client);
       $stmt->bindParam(2, $object->password_client);
       $stmt->bindParam(3, $object->name);
       $stmt->bindParam(4, $object->cpf);
       $stmt->bindParam(5, $object->birthDate);
       $stmt->bindParam(6, $object->email);
       return $stmt->execute();
    }
    //Buscar um Cliente por CPF
    public function findOne($cpf_client)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client WHERE cpf = $cpf_client;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Buscar todos Cliente
    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Atualizar Cliente
    public function update($object)
    {
        $connection = Connection::getConnection();
       $stmt = $connection->prepare("UPDATE client SET name_client=?, cpf_client=?, birthDate=?, email=? WHERE id_client=?;");
       $stmt->bindParam(1, $object->name_client);
       $stmt->bindParam(2, $object->cpf_client);
       $stmt->bindParam(3, $object->birthDate);
       $stmt->bindParam(4, $object->email);
       $stmt->bindParam(5, $object->id);
       return $stmt->execute();
    }
    //Deletar Cliente por ID
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('DELETE FROM client WHERE id_client = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

}