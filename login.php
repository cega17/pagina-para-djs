<?php
// Incluir archivo de conexión a la base de datos
include_once 'db_connection.php';

// Iniciar sesión
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar el usuario y contraseña (debes implementar una lógica de seguridad más sólida)
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // El usuario y la contraseña son válidos, iniciar sesión
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // Redirigir al área de miembros o panel de control
        exit();
    } else {
        $error_message = "Credenciales incorrectas. Por favor, inténtalo nuevamente.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Miembros - Iniciar Sesión</title>
    <link rel="stylesheet" href="login.css"> <!-- Archivo CSS personalizado -->
    
       
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Iniciar Sesión</h1>
        </div>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Iniciar Sesión</button>
            </div>
        </form>
        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>
