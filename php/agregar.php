<?php

include 'config.php';

if(isset($_REQUEST['btn-agregar'])){
    $nombreP = $_POST['nombre-p'];
    $sinopsisP = $_POST['sinopsisP'];
    $nombreImagen = $_FILES['imagen-p']['name'];
    $temporal = $_FILES['imagen-p']['tmp_name'];
    $carpeta = '../imagenes';
    $ruta = $carpeta.'/'.$nombreImagen;
    move_uploaded_file($temporal, $carpeta.'/'.$nombreImagen);
}

?>