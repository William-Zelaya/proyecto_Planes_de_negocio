<?php
session_start(); // Inicia la sesión

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - DECO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Estilos opcionales -->

    <style>
        body {
            background-image: url('https://res.cloudinary.com/dsrkdnu5y/image/upload/v1727375168/logo_yewluz.jpg'); /* URL de la imagen */
            background-size: contain; /* Ajusta la imagen para cubrir toda la pantalla */
            background-position: center 20%; /* Centra la imagen */
            height: 100vh;
        }
        .navbar-nav .nav-item {
            margin-right: 20px; /* Espacio entre los elementos del menú */
        }
        .nav-link {
            padding: 10px 15px; /* Espaciado interno en los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            transition: background-color 0.3s, color 0.3s; /* Transición suave para cambios de color */
            font-weight: bold;
        }
        .nav-link:hover {
            background-color: #007bff; /* Color de fondo al pasar el mouse */
            color: white; /* Color del texto al pasar el mouse */
        }
        .container {
           /* background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-transparente */
            padding: 30px; /* Espaciado interno */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Sombra */
            margin-top: 50px; /* Margen superior para separar del menú */
        }
        h1 {
            margin-bottom: 20px; /* Espacio debajo del título */
        }
        p {
            margin-bottom: 15px; /* Espacio debajo de los párrafos */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DECO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="vista/registro.php">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vista/login.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Publicar un Proyecto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Soluciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ofertas Laborales
                    </a>
                    <div class="dropdown-menu" aria-labelledby="offersDropdown">
                        <a class="dropdown-item" href="#">Programadores Principiantes</a>
                        <a class="dropdown-item" href="#">Programadores Intermedios</a>
                        <a class="dropdown-item" href="#">Programadores Junior</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Bienvenido a DECO</h1>

        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! Has iniciado sesión.</p>
            <a href="public/dashboard.php">Ir al Dashboard</a><br />
            <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <p>Por favor, inicia sesión o regístrate para continuar.</p>
            <a href="vista/login.php">Iniciar Sesión</a><br />
            <a href="vista/registro.php">Registrarse</a>
        <?php endif; ?>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>