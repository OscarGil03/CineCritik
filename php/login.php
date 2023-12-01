<?php

session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT * FROM usuario WHERE nombre='$usuario' AND pass='$contraseña'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows == 1) {
        // Obtener los datos del usuario
        $usuarioDatos = $resultado->fetch_assoc();

        // Almacenar en las variables de sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $usuarioDatos['id_usuario'];
        $_SESSION['is_admin'] = $usuarioDatos['is_admin'];

        header("Location: ../main.php");
    } else {
      
        echo '<script>alert("Inicio de sesión incorrecto"); window.location.href="../index.php";</script>';
    }
}

$conn->close();
?>
