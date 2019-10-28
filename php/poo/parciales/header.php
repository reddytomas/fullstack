<?php
require_once("controladores/funciones.php");
require_once("helpers.php");

 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
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

      <link rel="stylesheet" href="..//css/master.css">
      <title></title>
    </head>
  </head>
  <body>
    <header>

      <!-- navbar -------------------------------------->
      <nav class="navbar navbar-expand-lg navbar-light _ni_navbar mb-5">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Si está iniciado sesion, muestra un navbar, si no el otro -->
          <?php if (isset($_SESSION['nombre'])): ?>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex justify-content-around">
                  <a href="index1.php"  class="text-dark mr-3" id="_altasllantasfooter">Altas Llantas</a>
                  <a class="nav-item nav-link " href="index1.php">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-item nav-link" href="index1.php#productos">Productos</a>
                  <a class="nav-item nav-link" href="faq.php">FAQ</a>
                  <a class="nav-item nav-link" href="index1.php#contacto">Contacto</a>
                  <a class="nav-item nav-link text-secundary" href="logout.php" role="button">Cerrar sesión</a> <br>

                </div>

              </div>
              <?php else: ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex justify-content-around">
                  <a href="index1.php"  class="text-dark mr-3" id="_altasllantasfooter">Altas Llantas</a>
                  <a class="nav-item nav-link " href="index1.php">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-item nav-link" href="index1.php#productos">Productos</a>
                  <a class="nav-item nav-link" href="faq.php">FAQ</a>
                  <a class="nav-item nav-link" href="index1.php#contacto">Contacto</a>
                  <a class="nav-item nav-link" href="registrate.php">Registrate</a>
                  <a class="nav-item nav-link" href="login.php">Iniciar sesion</a>

                </div>

                </div>
          <?php endif; ?>

        <!-- iniciar, registro o mi perfil ----------------------->
          <?php if (isset($_SESSION['nombre'])): ?>
        <ul class="_perfilList">
          <a class="nav-item nav-link"href="perfil.php" id="iniciar"><li><i class="fas fa-user-circle fa-2x"></i></li></a>
          <a class="btn btn-primary btn-lg" href="carritodecompras.php" role="button"><li><i class="fas fa-shopping-cart"></i></li></a>

        </ul>
      <?php else :?>
        <!-- si no está iniciado sesion le muestra los iconos pero lo llevan a iniciar sesion -->
        <ul class="_perfilList">
          <a class="nav-item nav-link"href="login.php" id="iniciar"><li><i class="fas fa-user-circle fa-2x"></i></li></a>
          <a class="btn btn-primary btn-lg" href="login.php" role="button"><li><i class="fas fa-shopping-cart"></i></li></a>

        </ul>
      <?php endif; ?>
      </nav>

    </header>
</body>
</html>
