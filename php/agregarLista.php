<?php
include 'config.php'; // Asegúrate de incluir el archivo de configuración adecuado

// Iniciar sesión
session_start();

// Verificar si se ha recibido el parámetro id desde milista.php
if (isset($_GET['id'])) {
    // Obtener el id de la película desde el parámetro
    $id_pelicula = $_GET['id'];

    // Verificar si el id_usuario está presente en la sesión
    if (isset($_SESSION['id'])) {
        $id_usuario = $_SESSION['id'];

        // Verificar si la película ya está en la lista
        $consulta_verificar = $conn->prepare("SELECT id_lista FROM lista WHERE id_usuario = ? AND id_pelicula = ?");
        $consulta_verificar->bind_param("ii", $id_usuario, $id_pelicula);
        $consulta_verificar->execute();
        $consulta_verificar->store_result();

        if ($consulta_verificar->num_rows > 0) {
            // La película ya está en la lista, mostrar mensaje y redireccionar
            header("Location: ../milista.php?mensaje=La película ya se ha agregado a tu lista");
            exit();
        }

        // Preparar la consulta con sentencias preparadas
        $consulta_insertar = $conn->prepare("INSERT INTO lista (id_usuario, id_pelicula) VALUES (?, ?)");
        $consulta_insertar->bind_param("ii", $id_usuario, $id_pelicula);

        // Ejecutar la consulta
        if ($consulta_insertar->execute()) {
            // Cerrar la consulta preparada
            $consulta_insertar->close();

            // Redireccionar a milista.php con un mensaje
            header("Location: ../milista.php?mensaje=Película agregada a tu lista correctamente");
            exit();
        } else {
            echo "Error al agregar la película a la lista: " . $conn->error;
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
