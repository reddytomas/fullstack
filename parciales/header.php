<?php
require_once("../controladores/funciones.php");
require_once("../helpers.php");

 ?>

<header>
  <!-- navbar -------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-light _ni_navbar mb-5">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

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

    <!-- iniciar, registro o mi perfil ----------------------->
    <ul class="_perfilList">
      <a class="nav-item nav-link"href="perfil.php" id="iniciar"><li><i class="fas fa-user-circle fa-2x"></i></li></a>
      <a class="btn btn-primary btn-lg" href="carritodecompras.php" role="button"><li><i class="fas fa-shopping-cart"></i></li></a>

    </ul>
  </nav>

</header>
