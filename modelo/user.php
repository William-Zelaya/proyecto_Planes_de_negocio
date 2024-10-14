<?php
class User {
    private $conn;

    public function __construct() {
        // Incluir la conexión a la base de datos
        require_once '../db/conexion.php'; // Asegúrate de que esta ruta sea correcta
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para registrar un nuevo usuario
    public function register($data) {
        try {
            // Preparar la consulta SQL
            $sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña, tipo_usuario) VALUES (:nombre, :apellido, :email, :contraseña, :tipo_usuario)";
            $stmt = $this->conn->prepare($sql);
            
            // Vincular parámetros
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellido', $data['apellido']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':contraseña', $data['contraseña']);
            $stmt->bindParam(':tipo_usuario', $data['tipo_usuario']);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true; // Registro exitoso
            } else {
                return false; // Fallo en el registro
            }
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error en registro de usuario: " . $e->getMessage());
            return false; // Retornar falso en caso de error
        }
    }

    // Método para encontrar un usuario por email
    public function findByEmail($email) {
        try {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna el usuario o false si no existe
        } catch (PDOException $e) {
            error_log("Error al buscar usuario por email: " . $e->getMessage());
            return false; // Retornar falso en caso de error
        }
    }
}
?>
