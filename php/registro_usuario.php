<?php

    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    // Comprobar si el checkbox está marcado
    $isadmin = isset($_POST['isadmin']) ? 1 : 0;

    $registro = "INSERT INTO usuario(nombre, pass, is_admin) 
              VALUES('$usuario', '$pass', '$isadmin')";

    $ejecutar = $conn->query($registro);
    $conn->close();


    header("Location: ../index.html");
?>