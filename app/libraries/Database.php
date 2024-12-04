<?php

namespace app\libraries;

use PDO;
use PDOException;

class Database {
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $db;
    private $stmt;
    private $error;

    public function __construct() {
        // Configuración de la conexión
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->dbname = DB_NAME;

        try {
            // Conexión inicial sin base de datos
            $dsn = "mysql:host={$this->host}";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificar y crear la base de datos si es necesario
            if (!$this->databaseExists()) {
                $this->createDatabase();
            }

            // Conectar a la base de datos especificada
            $dsn .= ";dbname={$this->dbname}";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->handleError("Error en la conexión a la base de datos", $e);
        }
    }

    /**
     * Verificar si la base de datos existe.
     */
    private function databaseExists(): bool {
        try {
            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbname";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':dbname' => $this->dbname]);
            return $stmt->fetchColumn() !== false;
        } catch (PDOException $e) {
            $this->handleError("Error al verificar la base de datos", $e);
            return false;
        }
    }

    /**
     * Crear la base de datos si no existe.
     */
    private function createDatabase() {
        try {
            $this->db->exec("CREATE DATABASE {$this->dbname}");
        } catch (PDOException $e) {
            $this->handleError("Error al crear la base de datos", $e);
        }
    }

    /**
     * Preparar una consulta.
     */
    public function query(string $sql) {
        $this->stmt = $this->db->prepare($sql);
    }

    /**
     * Enlazar parámetros a la consulta.
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Ejecutar la consulta preparada.
     */
    public function execute(): bool {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $this->handleError("Error al ejecutar la consulta", $e);
            return false;
        }
    }

    /**
     * Obtener múltiples resultados.
     */
    public function resultSet(): array {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Obtener un único resultado.
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Contar filas afectadas.
     */
    public function rowCount(): int {
        return $this->stmt->rowCount();
    }

    /**
     * Manejar errores de la base de datos.
     */
    private function handleError(string $message, PDOException $e) {
        error_log("[Database Error] {$message}: " . $e->getMessage());
        if (defined('APP_ENV') && APP_ENV === 'development') {
            die("Error en la base de datos: {$e->getMessage()}");
        } else {
            die("Ocurrió un error en la base de datos. Por favor, contacte al administrador.");
        }
    }
}
