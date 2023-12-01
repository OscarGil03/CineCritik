<?php
include './php/config.php'; 

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
$id_usuario = $_SESSION['id']; // Asegúrate de incluir el id_usuario en la sesión
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

    <h2 class="titulo-seccion">BUSCAR PELICULAS</h2>

    <form action="" method="get" class="buscar">
        <input type="text" name="q" id="busqueda" placeholder="Buscar Pelicula">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if (isset($_GET['mensaje'])) {
        echo '<p class="Texto_Busqueda">' . $_GET['mensaje'] . '</p>';
    }
    ?>

    <?php
    if (isset($_GET['q'])) {
        $busqueda = $conn->real_escape_string($_GET['q']);
        $consulta = "SELECT * FROM peliculas WHERE titulo_p LIKE '%$busqueda%'";
        $resultado = $conn->query($consulta);
    }
    ?>

    <?php if (isset($resultado) && $resultado->num_rows > 0) { ?>
        <h3 class="Texto_Busqueda">Resultados de la búsqueda:</h3>

        <div class="tabla_peliculas">
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Sinopsis</th>
                        <th>Imagen</th>
                        <th>Acciones</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila['titulo_p']; ?></td>
                            <td><?php echo $fila['sinopsis_p']; ?></td>
                            <td><img src="<?php echo substr($fila['imagen_p'],3) ?>" alt="" srcset="" class="img_pelicula_admin"></td>
                            <td>
                                <a href="./php/agregarLista.php?id=<?php echo $fila['id_pelicula']; ?>">Agregar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } elseif (isset($resultado)) { ?>
        <h3 class="Texto_Busqueda">No se encontraron resultados.</h3>
    <?php } ?>
    
    <br/><br/><br/>
    <!-- Nueva sección para mostrar la tabla de elementos en la lista -->
    <?php
    // Consulta para obtener los elementos de la lista
    $consulta_lista = "SELECT lista.id_lista, peliculas.titulo_p, peliculas.sinopsis_p, peliculas.imagen_p 
                    FROM lista 
                    INNER JOIN peliculas ON lista.id_pelicula = peliculas.id_pelicula 
                    WHERE lista.id_usuario = $id_usuario";
    $resultado_lista = $conn->query($consulta_lista);

    if ($resultado_lista && $resultado_lista->num_rows > 0) {
    ?>
        <div class="tabla_peliculas">
            <h3>Tu Lista</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Sinopsis</th>
                        <th>Imagen</th>
                        <th>Acciones</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila_lista = $resultado_lista->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $fila_lista['titulo_p'] . '</td>';
                        echo '<td>' . $fila_lista['sinopsis_p'] . '</td>';
                        echo '<td><img src="' . substr($fila_lista['imagen_p'], 3) . '" alt="" srcset="" class="img_pelicula_admin"></td>';
                        echo '<td><a href="./php/borrarLista.php?id=' . $fila_lista['id_lista'] . '">Borrar</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo '<h2 class="titulo-seccion">No hay elementos en tu lista</h2>';
    }
    ?>

    <?php
    $conn->close();
    ?>
</body>
</html>
