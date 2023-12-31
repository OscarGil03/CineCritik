<?php

  session_start();
  if (!isset($_SESSION['usuario'])){
    echo'
      <script>
        alert("Por favor debes iniciar sesión");
        window.location = "index.php";
      </script>
    ';
    session_destroy();
    die();
  }

  $nombreUsuario = $_SESSION['usuario'];
  $isAdmin = $_SESSION['is_admin'];

?>

<html>
<head>
<title>Five Nights at Freddy's</title>
<meta charset="utf-8">
<script src="app.js" defer></script>
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>

    <img src="./imagenes/logopageblank.png" alt="Logo main" class="imglogo">

    <div class="topnav" id="myTopnav">
        <a href="main.php" >Inicio</a>
        <a href="peliculas.html" >Peliculas</a>
        <a href="series.html">Series</a>
        <a href="estrenos.html">Estrenos</a>
        <a href="populares.html">Más Populares</a>
        <a href="milista.html">Mi lista</a>
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
    
    <div class="peli-container">
        <h2 class="titulo-seccion">Five Nights at Freddy's</h2>

        <div class="peli-foto center">
            <img src="./imagenes/fnaf.jpeg" alt="FNAF Poster" class="imgmovie"> <br>
            <p class="peli-calificacion"> 
                Calificacion General: 7
            </p>
        </div>

            <section class="peli-descripcion">
            <p class="peli-sinopsis">Un problemático guardia de seguridad empieza a trabajar en la pizzería Freddy Fazbear's. 
                Mientras pasa su primera noche en el trabajo, se da cuenta de que el turno   de noche en Freddy's no será tan fácil 
                de sobrellevar.</p>

                <div class="rating-box">
                    <header>Califica la Pelicula</header>
                    <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </section>
    
    </div>
 


</body>
</html>