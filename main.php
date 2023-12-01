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
  $idUsuario = $_SESSION['id'];
  $isAdmin = $_SESSION['is_admin'];

?>

<html>
<head>
    <title>CINECRITIK</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./imagenes/logopag.png">
    <script src="app.js" defer></script>
</head>
<body>

    <img src="./imagenes/logopageblank.png" alt="Logo main" class="imglogo">

    <div class="topnav" id="myTopnav">
        <a href="peliculas.html" >Peliculas</a>
        <a href="series.html">Series</a>
        <a href="estrenos.html">Estrenos</a>
        <a href="populares.html">Más Populares</a>
        <a href="milista.html">Mi lista</a>
        <a href="php/logout.php" class="tableft">Cerrar Sesión
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
        <a class="tableft">
            <?php echo $nombreUsuario?>
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

      

    <section class="carrousel"> 
      <h2 class="titulo-seccion">Peliculas de la Semana</h2>
      <button class="pre-btn"><img src="imagenes/arrow.png" alt=""></button>
      <button class="nxt-btn"><img src="imagenes/arrow.png" alt=""></button>

      <div class="seccion-container">
        <div class="pelicula-card">
          <div class="pelicula-image">
            <a href="semana1.html"><img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt=""></a>
          </div>
          <div class="pelicula-info">
            <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
          </div>
        </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>
      </div>
    </section>
      
    <section class="carrousel"> 
      <h2 class="titulo-seccion">Recomendaciones para ti</h2>
      <button class="pre-btn"><img src="imagenes/arrow.png" alt=""></button>
      <button class="nxt-btn"><img src="imagenes/arrow.png" alt=""></button>

      <div class="seccion-container">
        <div class="pelicula-card">
          <div class="pelicula-image">
            <a href="semana1.html"><img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt=""></a>
                    </div>
          <div class="pelicula-info">
            <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
          </div>
        </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>
      </div>
    </section>

    <section class="carrousel"> 
      <h2 class="titulo-seccion">Populares entre tus amigos</h2>
      <button class="pre-btn"><img src="imagenes/arrow.png" alt=""></button>
      <button class="nxt-btn"><img src="imagenes/arrow.png" alt=""></button>

      <div class="seccion-container">
        <div class="pelicula-card">
          <div class="pelicula-image">
            <a href="semana1.html"><img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt=""></a>
                    </div>
          <div class="pelicula-info">
            <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
          </div>
        </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/fnaf.jpeg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Five Nights At Freddys</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ladl.webp" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Asesions de la Luna</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/radical.jpg_large" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Radical</h2>
            </div>
          </div>

          <div class="pelicula-card">
            <div class="pelicula-image">
              <img src="imagenes/ljdh.jpg" class="pelicula-thumb" alt="">
            </div>
            <div class="pelicula-info">
              <h2 class="pelicula-nombre">Los Juegos del Hambre</h2>
            </div>
          </div>
      </div>
    </section>

</body>
</html>