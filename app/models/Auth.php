<?php
namespace app\models;
use app\libraries\Database;
use PDO;

class Auth {
    private $conexion;


    public function __construct($conexion) {
        $this->conexion = new Database;
    }

    public function autenticarUsuario(string $username, string $password) : bool {
        // Consulta SQL para buscar al usuario por nombre de usuario
        $consulta = "SELECT id, username, password FROM usuarios WHERE username = :username";
       $this->conexion->query($consulta);
       $this->conexion->bind(':username', $username);
       $this->conexion->execute();

        // Obtener el resultado de la consulta
        $usuario =$this->conexion->single(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar la contraseña
            if (password_verify($password, $usuario['password'])) {
                // Autenticación exitosa
                return true;
            }
        }

        // Autenticación fallida
        return false;
    }

    public function agregarUsuario(string $username, string $password) {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Consulta SQL para insertar un nuevo usuario
        $consulta = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
       $this->conexion->query($consulta);
       $this->conexion->bind(':username', $username);
       $this->conexion->bind(':password', $hashedPassword);

        // Ejecutar la consulta
        return$this->conexion->execute();
    }

    public function modificarContraseña($id, $newPassword) {
        // Hash de la nueva contraseña
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Consulta SQL para actualizar la contraseña del usuario
        $consulta = "UPDATE usuarios SET password = :password WHERE id = :id";
       $this->conexion->query($consulta);
       $this->conexion->bind(':password', $hashedPassword);
       $this->conexion->bind(':id', $id);

        // Ejecutar la consulta
        return$this->conexion->execute();
    }
    
    public function crearTablaUsuarios() {
        // Consulta SQL para crear la tabla si no existe
        $consulta = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        // Ejecutar la consulta
        return $this->conexion->execute($consulta);
    }
}
?>
