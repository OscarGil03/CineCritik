<?php

    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $registro = "INSERT INTO usuario(nombre, pass) 
              VALUES('$usuario', '$pass')";

    $ejecutar = mysqli_query($conn, $registro);

    header("Location: ../index.html");
?>