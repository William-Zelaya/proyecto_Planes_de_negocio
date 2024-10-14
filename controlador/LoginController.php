<?php
session_start();
require_once '../modelo/user.php';
require_once '../db/conexion.php'; // Asegúrate de que esta ruta sea correcta

class LoginController {
    private $db;

    public function __construct() {
        $conexion = new Database();
        $this->db = $conexion->getConnection();
    }

    public function login() {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['contraseña'] ?? '';

        // Validar que ambos campos no estén vacíos
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Ambos campos son obligatorios.";
            header("Location: /deco/vista/login.php");
            exit();
        }

        // Llamar al modelo para buscar el usuario por email
        $userModel = new User();
        $usuario = $userModel->findByEmail($email);

        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario && password_verify($password, $usuario['contraseña'])) {
            // Iniciar sesión correctamente
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            header("Location: /deco/vista/dashboard.php"); // Redirigir al dashboard
            exit();
        } else {
            // Si las credenciales son incorrectas
            $_SESSION['error'] = "Credenciales incorrectas.";
            header("Location: /deco/vista/login.php");
            exit();
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoginController();
    $controller->login();
} else {
    // Redirigir al login si no se accede a esta página mediante POST
    header("Location: /deco/vista/login.php");
    exit();
}
?>
