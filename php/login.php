<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT * FROM usuario WHERE nombre='$usuario' AND pass='$contraseña'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows == 1) {
        header("Location: ../main.html");
    } else {
      
        echo '<script>alert("Inicio de sesión incorrecto"); window.location.href="../index.html";</script>';
    }
}

$conn->close();
?>
