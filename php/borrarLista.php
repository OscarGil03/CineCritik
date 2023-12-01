<?php
include 'config.php'; // Asegúrate de incluir el archivo de configuración adecuado

// Iniciar sesión
session_start();

// Verificar si se ha recibido el parámetro id desde milista.php
if (isset($_GET['id'])) {
    // Obtener el id de la lista desde el parámetro
    $id_lista = $_GET['id'];

    // Verificar si el id_usuario está presente en la sesión
    if (isset($_SESSION['id'])) {
        $id_usuario = $_SESSION['id'];

        // Preparar la consulta con sentencias preparadas
        $consulta_borrar = $conn->prepare("DELETE FROM lista WHERE id_lista = ? AND id_usuario = ?");
        $consulta_borrar->bind_param("ii", $id_lista, $id_usuario);

        // Ejecutar la consulta
        if ($consulta_borrar->execute()) {
            // Cerrar la consulta preparada
            $consulta_borrar->close();

            // Redireccionar a milista.php con un mensaje
            header("Location: ../milista.php?mensaje=Elemento borrado de tu lista correctamente");
            exit();
        } else {
            echo "Error al borrar el elemento de la lista: " . $conn->error;
        }
    } else {
        echo "Error: Falta el id_usuario en la sesión.";
    }
} else {
    echo "Error: Falta el parámetro id.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
