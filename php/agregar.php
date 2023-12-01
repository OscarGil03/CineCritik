<?php
include 'config.php';

if (isset($_POST['btn-agregar'])) {
    $nombreP = $_POST['nombre-p'];
    $sinopsisP = $_POST['sinopsis-p'];
    $nombreImagen = $_FILES['imagen-p']['name'];
    $temporal = $_FILES['imagen-p']['tmp_name']; 
    $carpeta = '../imagenes';
    $ruta = $carpeta . '/' . $nombreImagen;
    move_uploaded_file($temporal, $ruta); 

    $queryInsert = "INSERT INTO peliculas(titulo_p, sinopsis_p, imagen_p)
                    VALUES('$nombreP', '$sinopsisP', '$ruta')";

    $ejecutar = $conn->query($queryInsert);
    $conn->close();

    if ($ejecutar) {
        header("Location: ../agregarPeliculas.php");
    } else {
        echo "Hubo un error";
    }
}
?>
