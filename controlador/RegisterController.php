<?php
session_start(); // Asegúrate de que la sesión esté iniciada
require_once '../modelo/user.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class RegisterController {
    public function store() {
        // Recoge los datos del formulario
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['contraseña'] ?? '';
        $tipo_usuario = $_POST['tipo_usuario'] ?? '';

        // Validar campos
        if (empty($nombre) || empty($apellido) || empty($email) || empty($password) || empty($tipo_usuario)) {
            $_SESSION['error'] = "Todos los campos son obligatorios.";
            header("Location: /deco/vista/registro.php");
            exit();
        }

        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Formato de email inválido.";
            header("Location: /deco/vista/registro.php");
            exit();
        }

        // Cifrar la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Llamar al modelo para registrar
        $userModel = new User();
        if ($userModel->register([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'contraseña' => $password_hash,
            'tipo_usuario' => $tipo_usuario
        ])) {
            $_SESSION['success'] = "Registro exitoso. Ahora puedes iniciar sesión."; // Mensaje de éxito
            header("Location: /deco/vista/login.php");
            exit();
        } else {
            $_SESSION['error'] = "Error en el registro. Inténtelo de nuevo.";
            header("Location: /deco/vista/registro.php");
            exit();
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new RegisterController();
    $controller->store();
}
?>
