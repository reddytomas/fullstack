<?php
  require_once('controladores/funciones.php');
  require_once('helpers.php');

  if(!isset($_SESSION["email"])) {
    header("location:registro.php");
    exit;
  }


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fuentes y nuestro stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Ceviche+One|Sedgwick+Ave|Sedgwick+Ave+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display|Raleway|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">

    <link rel="stylesheet" href="../css/perfil.css">
    <title>Carrito</title>
  </head>

<body>
  <div class="container-fluid m-0 p-0">
    <?php require_once 'parciales/header.php'; ?>
    <img class="rounded-circle w-50" src="imagenes/<?=$_SESSION['avatar'];?>" alt="avatar">

    <div class="jumbotron">

      <h1 class=" _tituloPagina ml-1 mr-1  bg-light text-dark pl-3 mb-3  text-center">Bienvenido, <?=$_SESSION['nombre'] ;?>!</h1>
        <p class="lead">Aqui podras encontrar informacion de tu perfil...</p>
        <hr class="my-4">

        <p><br>Este es tu carrito de compras, donde podes seleccionar lo que quieras comprar. </p>
        <a class="btn btn-primary btn-lg" href="carritodecompras.php" role="button"><i class="fas fa-shopping-cart"></i></a><br><br>
        <p>Ya te queres ir!? Acá podes cerrar tu sesión...</p>
        <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a> <br>

    </div>
    <!-- FOOTER con redes y nada mas -->
    <?php require_once 'parciales/footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
