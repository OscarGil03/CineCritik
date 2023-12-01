<?php
include 'config.php';

//Verificacion Inicio de sesion
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

// formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelicula = $_POST['id_pelicula'];
    $nuevo_titulo = $_POST['nuevo_titulo'];
    $nueva_sinopsis = $_POST['nueva_sinopsis'];

    // actualización en la base de datos
    $consulta_actualizacion = "UPDATE peliculas SET titulo_p='$nuevo_titulo', sinopsis_p='$nueva_sinopsis' WHERE id_pelicula=$id_pelicula";

    if ($conn->query($consulta_actualizacion) === TRUE) {
        echo "Los cambios se han guardado correctamente.";
    } else {
        echo "Error al actualizar los cambios: " . $conn->error;
    }
} else {
    //  información actual de la película para llenar el formulario
    if (isset($_GET['id'])) {
        $id_pelicula = $_GET['id'];

        $consulta_info_pelicula = "SELECT * FROM peliculas WHERE id_pelicula=$id_pelicula";
        $resultado_info_pelicula = $conn->query($consulta_info_pelicula);

        if ($resultado_info_pelicula->num_rows > 0) {
            $fila = $resultado_info_pelicula->fetch_assoc();
        } else {
            echo "No se encontró la película.";
            exit; 
        }
    } else {
        echo "ID de película no proporcionado.";
        exit; 
    }
}

// Verificar si se ha enviado la solicitud de eliminación
if (isset($_POST['eliminar_pelicula'])) {
    // Realiza la eliminación en la base de datos
    $consulta_eliminacion = "DELETE FROM peliculas WHERE id_pelicula=$id_pelicula";

    if ($conn->query($consulta_eliminacion) === TRUE) {
        header("Location: ../peliculasAdmin.php");
        exit;
    } else {
        echo "Error al eliminar la película: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PELICULA</title>
    <link rel="stylesheet" type="text/css" href="../estilos.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../imagenes/logopag.png">
    
</head>
<body>
    <img src="../imagenes/logopageblank.png" alt="Logo main" class="imglogo">

    <div class="topnav" id="myTopnav">
        <a href="../main.php" >Inicio</a>
        <a href="../peliculas.html" >Peliculas</a>
        <a href="../series.html">Series</a>
        <a href="../estrenos.html">Estrenos</a>
        <a href="../populares.html">Más Populares</a>
        <a href="../milista.html">Mi lista</a>
        <a href="php/logout.php" class="tableft">Cerrar Sesión
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
        <a class="tableft">
            Usuario: <?php echo $nombreUsuario?>
        </a>
        <?php
            // Mostrar elementos adicionales si el usuario es administrador
            if ($isAdmin) {
                echo '<a href="../peliculasAdmin.php" class="tableft">Modificar Peliculas</a>';
                echo '<a href="../agregarPeliculas.php" class="tableft">Modificar Peliculas</a>';
            }
        ?>
        <a href="javascript:void(0);" class="icon" onclick="NavTabResp()">
          <i class="fa fa-bars"></i>
        </a>
      </div>

    <h2 class="titulo-seccion">Editar Pelicula </h2>

    <div class="cuadro-form">
        <form action="editar.php" method="post">
            <input type="hidden" name="id_pelicula" value="<?php echo $fila['id_pelicula']; ?>">
            <h2 class="title">Nuevo Titulo:</h2>
            <label for="nuevo_titulo">
            <input type="text" id="nuevo_titulo" name="nuevo_titulo" value="<?php echo $fila['titulo_p']; ?>" required>
            </label>
            <div class='sinopsis-div'>
                <h2 class="title">Nueva Sinopsis:</h2>
                <label for="nueva_sinopsis">
                <textarea id="nueva_sinopsis" name="nueva_sinopsis" required><?php echo $fila['sinopsis_p']; ?></textarea>
                </label>
            </div>
            <button type="submit" class='btn-guardar'>Guardar Cambios</button>
        </form>
    </div>

    
    <form action="editar.php" method="post">
        <input type="hidden" name="id_pelicula" value="<?php echo $fila['id_pelicula']; ?>">
        <button class="btn-eliminar" type="submit" name="eliminar_pelicula" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?')">Eliminar Película</button>
    </form>


</body>
</html>