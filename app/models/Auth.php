<?php

class ModeloLogin {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function autenticarUsuario($username, $password) {
        // Consulta SQL para buscar al usuario por nombre de usuario
        $consulta = "SELECT id, username, password FROM usuarios WHERE username = :username";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Obtener el resultado de la consulta
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar la contraseña
            if (password_verify($password, $usuario['password'])) {
                // Autenticación exitosa, devuelve los datos del usuario
                return $usuario;
            }
        }

        // Autenticación fallida
        return false;
    }

    public function agregarUsuario($username, $password) {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Consulta SQL para insertar un nuevo usuario
        $consulta = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        // Ejecutar la consulta
        return $stmt->execute();
    }

    public function modificarContraseña($id, $newPassword) {
        // Hash de la nueva contraseña
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Consulta SQL para actualizar la contraseña del usuario
        $consulta = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta
        return $stmt->execute();
    }
    
    public function crearTablaUsuarios() {
        // Consulta SQL para crear la tabla si no existe
        $consulta = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        // Ejecutar la consulta
        return $this->conexion->exec($consulta);
    }
}
?>
