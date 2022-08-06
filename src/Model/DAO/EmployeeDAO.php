<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class EmployeeDAO implements DAO
{
    //Cadastrar Funcionário    
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO employee VALUES(null,?,?,?,?,?,?,null);");
        $stmt->bindParam(1, $object->registration_employee);
        $stmt->bindParam(2, $object->password_employee);
        $stmt->bindParam(3, $object->name);
        $stmt->bindParam(4, $object->cpf);
        $stmt->bindParam(5, $object->birthDate);
        $stmt->bindParam(6, $object->email);
        return $stmt->execute();
    }
    //Buscar um Funcionário por CPF
    public function findOne($cpf_employee)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM employee WHERE cpf = $cpf_employee;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Buscar todos os Funcionários
    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM employee;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Atualizar Funcionário
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("UPDATE employee SET registration_employee=?, password_employee=?, name_employee=?, cpf=?, birthDate=?, email=? WHERE id_employee=?;");
        $stmt->bindParam(1, $object->registration_employee);
        $stmt->bindParam(2, $object->password_employee);
        $stmt->bindParam(3, $object->name_employee);
        $stmt->bindParam(4, $object->cpf);
        $stmt->bindParam(5, $object->birthDate);
        $stmt->bindParam(6, $object->email);
        $stmt->bindParam(7, $object->id);
        return $stmt->execute();
    }
    //Deletar Funcionário por ID
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('DELETE FROM employee WHERE id_employee= ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}