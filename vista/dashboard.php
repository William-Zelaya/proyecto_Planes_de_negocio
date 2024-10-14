<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluye aquí archivos de configuración o conexión a la base de datos si es necesario
// include '../bd/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DECO</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Asegúrate de tener tu CSS -->
</head>
<body>
    <header>
        <h1>Bienvenido al Dashboard</h1>
        <nav>
            <ul>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Información del usuario</h2>
        <p>ID de usuario: <?php echo $_SESSION['id_usuario']; ?></p>
        <!-- Aquí puedes añadir más información relevante sobre el usuario -->
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> DECO. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
