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
            <a href="main.php">Inicio</a>
            <a href="series.html">Series</a>
            <a href="estrenos.html">Estrenos</a>
            <a href="populares.html">Más Populares</a>
            <a href="php/logout.php" class="tableft">Cerrar Sesión
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
            <a href="javascript:void(0);" class="icon" onclick="NavTabResp()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
  
        <h2 class="titulo-seccion">Peliculas ADMIN</h2>

        <form action="" method="get">
            <input type="text" name="q" id="busqueda" placeholder="Buscar Pelicula">
            <button type="submit">Buscar</button>
        </form>

        <?php
            include './php/config.php'; 

            if (isset($_GET['q'])) {
                $busqueda = $conn->real_escape_string($_GET['q']);
                $consulta = "SELECT * FROM peliculas WHERE titulo_p LIKE '%$busqueda%'";
            } else {
                $consulta = "SELECT * FROM peliculas";
            }

            $resultado = $conn->query($consulta);
        ?>

        <?php if ($resultado->num_rows > 0) { ?>
            <h3>Resultados de la búsqueda:</h3>
        <?php } else { ?>
            <p>No se encontraron resultados.</p>
        <?php } ?>

        <div class="tabla_peliculas">
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Sinopsis</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <tr>
                            
                            <td><?php echo $fila['titulo_p']; ?></td>
                            <td><?php echo $fila['sinopsis_p']; ?></td>
                            <td><?php echo $fila['imagen_p']; ?></td>
                            <td>
                                <a href="./php/editar.php?id=<?php echo $fila['id_pelicula']; ?>">Editar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>  

        <?php
        $conn->close();
        ?>

    </body>
</html>