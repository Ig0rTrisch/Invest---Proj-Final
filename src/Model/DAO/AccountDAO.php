<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class AccountDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO account VALUES (null,?,?,?);");
        $stmt->bindParam(1, $object->balance);
        $stmt->bindParam(2, $object->financing);
        $stmt->bindParam(3, $object->debit_per_month);
        return $stmt->execute();
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM account WHERE id_account = $id;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM account;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('UPDATE account SET balance=?, finance=?, ');
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query('DELETE FROM account WHERE id_account=?;');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
