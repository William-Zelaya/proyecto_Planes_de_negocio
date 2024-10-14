<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - DECO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Estilos opcionales -->
    <style>
        body {
            background-image: url('https://res.cloudinary.com/dsrkdnu5y/image/upload/v1727375168/logo_yewluz.jpg'); /* URL de la imagen */
            background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px; /* Ancho del formulario */
            position: absolute;
            left: 50px; /* Alineación hacia la izquierda */
            top: 50%;
            transform: translateY(-50%); /* Centrando verticalmente */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-custom {
            width: 100%; /* Botón ocupa todo el ancho del contenedor */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Registro de Usuario</h2>
        <form action="../controlador/RegisterController.php?action=registrar" method="POST">
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
                    <option value="">Seleccione su rol</option>
                    <option value="freelancer">Freelancer</option>
                    <option value="cliente">Cliente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-custom">Registrarse</button> <!-- Botón centrado -->
        </form>
        <p class="text-center mt-3">¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p> <!-- Texto centrado -->
    </div>

    <!-- Scripts de Bootstrap (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
