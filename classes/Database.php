<?php

class Database
{
    private static $instance;
    private PDO $pdo;

    private function __construct()
    {
        $config = require_once __DIR__ . '/../db_config.php';
        try {
            $this->pdo = new PDO('mysql:dbname=' . $config["db_name"] . ';host=' . $config["db_host"] . ':' . $config["db_port"] . ';charset=utf8mb4', $config["db_user"], $config["db_password"]);
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
    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}
