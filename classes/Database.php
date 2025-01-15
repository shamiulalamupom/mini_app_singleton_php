<?php

class Database
{
    private static $instance;

    private PDO $pdo;

    // The constructor is private
    private function __construct()
    {
        $config = require_once __DIR__ . '/../db_config.php';
        try {
            $this->pdo = new PDO('mysql:dbname=' . $config["db_name"] . ';host=' . $config["db_host"] . ':' . $config["db_port"] . ';charset=utf8mb4', $config["db_user"], $config["db_password"]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // This static method will allow use to get an instance of the class
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database;
        }
        return self::$instance;
    }
    // This method will return an instance of PDO
    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}
