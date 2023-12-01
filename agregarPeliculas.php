<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    echo '
      <script>
        alert("Por favor, debes iniciar sesión");
        window.location = "index.php";
      </script>
    ';
    session_destroy();
    die();
  }

  $nombreUsuario = $_SESSION['usuario'];

  $isAdmin = $_SESSION['is_admin'];

  // Verificar si el usuario no es un administrador
  if (!$isAdmin) {
    echo '
      <script>
        alert("Acceso denegado. Debes ser administrador para ver esta página");
        window.location = "main.php";
      </script>
    ';
    die();
  }
?>

<html>
    <head>
        <title>PELICULAS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./imagenes/logopag.png">
    </head>
    <body>
       
        <img src="./imagenes/logopageblank.png" alt="Logo main" class="imglogo">

        <div class="topnav" id="myTopnav">
        <a href="main.php" >Inicio</a>
        <a href="peliculas.php" >Peliculas</a>
        <a href="series.php">Series</a>
        <a href="estrenos.php">Estrenos</a>
        <a href="populares.php">Más Populares</a>
        <a href="milista.php">Mi lista</a>
        <a href="php/logout.php" class="tableft">Cerrar Sesión
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
        <a class="tableft">
            Usuario: <?php echo $nombreUsuario?>
        </a>
        <?php
            // Mostrar elementos adicionales si el usuario es administrador
            if ($isAdmin) {
                echo '<a href="peliculasAdmin.php" class="tableft">Modificar Peliculas</a>';
                echo '<a href="agregarPeliculas.php" class="tableft">Agregar Peliculas</a>';
            }
        ?>
        <a href="javascript:void(0);" class="icon" onclick="NavTabResp()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
  
        <h2 class="titulo-seccion">Agregar Peliculas</h2>

        <div class="cuadro-form">
            <form action="php/agregar.php" method="POST" enctype="multipart/form-data">
                <h2 class="title">Nombre Pelicula:</h2>
                <label for="nombre-p">
                    <input placeholder="Nombre Pelicula" type="text" id="nombre-p" name="nombre-p">
                </label>
                <h2 class="title">Sinopsis:</h2>
                <div class='sinopsis-div'>
                <label for="sinopsis-p">
                    <textarea placeholder="Sinopsis" type="text" id="sinopsis-p" name="sinopsis-p"></textarea>
                </label>
                </div>
                <h2 class="title">Imagen:</h2>
                <label for="imagen-p">
                    <input type="file" id="imagen-p" name="imagen-p">
                </label>
                <button type="submit" name="btn-agregar" id="btn-agregar">Agregar</button>
            </form>
        </div>

    </body>
</html>
