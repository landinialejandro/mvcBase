<?php
/* PDO database class */
namespace app\libraries;
use PDO, PDOException;

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $db;
    private $stmt;
    private $error;

    public function __construct(){
        try {
            // Set DSN
            $dsn = "mysql:host={$this->host}";

            // Create instance
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if the database exists, and if not, create it
            if (!$this->databaseExists()) {
                $this->createDatabase();
            }

            // Now, connect to the specified database
            $dsn .= ";dbname={$this->dbname}";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            // Handle the error here (log it, display a custom error message, etc.)
            die("Database connection error: " . $this->error);
        }
    }

    private function databaseExists() {
        $stmt = $this->db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->dbname}'");
        return ($stmt->fetchColumn() !== false);
    }

    private function createDatabase() {
        try {
            $this->db->exec("CREATE DATABASE {$this->dbname}");
        } catch(PDOException $e) {
            // Handle the error here (log it, display a custom error message, etc.)
            die("Database creation error: " . $e->getMessage());
        }
    }

    // Resto de tus métodos...
}
