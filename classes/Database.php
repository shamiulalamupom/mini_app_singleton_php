<?php

class Database
{
    private static $instance;
    private PDO $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO('mysql:dbname=keyce_test;host=localhost;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database;
        }
        return self::$instance;
    }
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
