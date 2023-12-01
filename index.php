<?php
    session_start();

    if (isset($_SESSION["usuario"])){
        header("location: main.php");    
    }

?>

<html>
    <head>
        <title>CineCrtik</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
        <link rel="icon" href="./imagenes/logopag.png">
        <script src="app.js"></script>
    </head>
    <body>
        <header>
            <h1>CINECRITIK</h1>
        </header>

        <div class="cuadro-form">
            <form action="php/login.php" method="post">
                <h1 class="title">INICIA SESIÓN</h1>
                <label for="usuario">
                    <input placeholder="Usuario" type="text" id="usuario" name="usuario">
                </label>
                <label for="pass">
                    <input placeholder="Contraseña" type="password" id="pass" name="contraseña">
                </label>
                <button id="boton" type="submit" >Ingresar</button>
                <p class="registro-text">Aún no tienes sesión?</p>
                <button type="button" onclick="window.location.href='registro.html'">Registrarse</button>
            </form>
        </div>
    </body>
</html>