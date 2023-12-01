<?php

    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $registro = "INSERT INTO usuario(nombre, pass) 
              VALUES('$usuario', '$pass')";

    $ejecutar = $conn->query($registro);
    $conn->close();


    header("Location: ../index.html");
?>