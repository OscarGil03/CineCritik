<?php
include 'config.php'; // Asegúrate de incluir el archivo de configuración adecuado

// Iniciar sesión
session_start();

// Verificar si se ha recibido el parámetro id desde milista.php
if (isset($_GET['id'])) {
    // Obtener el id de la película desde el parámetro
    $id_pelicula = $_GET['id'];

    // Verificar si el id_usuario está presente en la sesión
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        // Preparar la consulta con sentencias preparadas
        $consulta_insertar = $conn->prepare("INSERT INTO lista (id_usuario, id_pelicula) VALUES (?, ?)");
        $consulta_insertar->bind_param("ii", $id_usuario, $id_pelicula);

        // Ejecutar la consulta
        if ($consulta_insertar->execute()) {
            echo "La película se ha agregado a tu lista correctamente.";
        } else {
            echo "Error al agregar la película a la lista: " . $conn->error;
        }

        // Cerrar la consulta preparada
        $consulta_insertar->close();
    } else {
        echo "Error: Falta el id_usuario en la sesión.";
    }
} else {
    echo "Error: Falta el parámetro id.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
