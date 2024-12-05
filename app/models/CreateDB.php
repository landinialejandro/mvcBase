<?php
namespace app\models;
use PDO;
use PDOException;

try {
    // Conexión a la base de datos
    $db = new PDO('mysql:host=localhost', 'nombre_usuario', 'contraseña');
    
    // Verificar si la base de datos existe
    $databaseExists = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'nombre_base_datos'")->fetch();
    
    if (!$databaseExists) {
        // Crear la base de datos
        $db->exec("CREATE DATABASE nombre_base_datos");
        
        // Selección de la base de datos
        $db->exec("USE nombre_base_datos");
        
        // Creación de la tabla "users"
        $db->exec("CREATE TABLE users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL
        )");
        
        // Generación del usuario "admin"
        $username = 'admin';
        $password = password_hash('password_admin', PASSWORD_DEFAULT);
        $db->exec("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        
        echo "Base de datos y tabla creadas correctamente.";
    } else {
        echo "La base de datos ya existe.";
    }
} catch (PDOException $e) {
    echo "Error al crear la base de datos: " . $e->getMessage();
}

try {
    // Conexión a la base de datos
    $db = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'nombre_usuario', 'contraseña');
    
    // Verificar si la tabla "users" ya existe
    $tableExists = $db->query("SHOW TABLES LIKE 'users'")->rowCount() > 0;
    
    if (!$tableExists) {
        // Creación de la tabla "users"
        $db->exec("CREATE TABLE users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL
        )");
        
        // Generación del usuario "admin"
        $username = 'admin';
        $password = password_hash('password_admin', PASSWORD_DEFAULT);
        $db->exec("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        
        echo "La tabla 'users' ha sido creada correctamente.";
    } else {
        echo "La tabla 'users' ya existe.";
    }
} catch (PDOException $e) {
    echo "Error al crear la tabla 'users': " . $e->getMessage();
}
