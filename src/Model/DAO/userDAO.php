<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class UserDAO
{
    public function findEmployee($login)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM employee WHERE registration_employee = '$login';");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findClient($login)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client WHERE login = '$login';");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
