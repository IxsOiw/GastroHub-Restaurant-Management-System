<?php

namespace Ixsaiw\Bistro;

use PDO;

class Database
{
    public $connection;

    public function __construct($database)
    {
        $dsn = "mysql:host={$database['host']};port={$database['port']};dbname={$database['dbname']};charset={$database['charset']}";
        $this->connection = new PDO(
            $dsn,
            $database['user'],
            $database['password'],
            [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
        );
    }
    public function query($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);

        return $stmt;
    }

    public function getAll($query, $params = [])
    {
        return $this->query($query, $params)->fetchAll();
    }

    public function get($query, $params = [])
    {
        return $this->query($query, $params)->fetch();
    }

}
