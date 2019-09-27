<?php
  require_once('controladores/funciones.php');
  require_once('helpers.php');
  if($_POST){
    $errores = validarLogin($_POST);
    if(count($errores)==0){
      $usuario = buscarPorEmail($_POST['email']);
      if($usuario==null){
        $errores['email']="Usuario no encontrado...";
      }else{
        //Desde aquí incio mi revisión a ver que ocurre con los contenidos de las variables y tratar de ver que ocurre
        //Aquí ví que el dato viene bien, es decir el password hasheado
        //dd($usuario['password']);
        //Ahora veo que trae esta variable  y noto que trae el dato correctamente
        //dd($_POST['password']);
        //Aquí estaba el error a la función password_verify, se le debe psar primero el dato no hasheado y luego el hasheado, ese fue mi error, lo habia pasado al contrario
        if(password_verify($_POST['password'],$usuario['password'])===false){
          $errores['password']="Datos inválidos...";
        }else{
          seteoUsuario($usuario,$_POST);
          if(validarUsuario()){
            header('location:perfil.php');
            exit;
          }else{
            header('location:login.php');
            exit;
          }
        }
      }
    }
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

    <!-- aca va lo del login -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/login.css">
    <title>Registro</title>
  </head>

<body>
  <div class="container-fluid m-0 p-0">
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
    <div><h1 id="caccount" class="_tituloPagina ml-1 mr-1  bg-light text-dark pl-3 mb-3  text-center">Iniciar Sesión</h1></div>

    <main class="container">

      <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
      </div>
      <?php if(isset($errores)):?>
                <ul class="alert alert-danger">
                  <?php foreach ($errores as $value) :?>
                      <li><?=$value;?></li>
                  <?php endforeach;?>
                </ul>
              <?php endif;?>
      <!-- Login Form -->
      <form id="formulario" class="form" name="formLogin" novalidate action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input require name="email" class="form-control" id="email" type="text" id="login" class="fadeIn second" name="login" placeholder="login" value="<?=isset($errores["email"])?"": old("email");?>">
        </div>
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>


    </main>
<br>
<!-- FOOTER con redes y nada mas -->
<footer class="bg-light w-100">
  <p class="text-center" id="_altasllantasfooter">Altas Llantas</p>
  <ul class="list-unstyled list-group-horizontal d-flex justify-content-around ">
    <li><a href=""><i class="fab fa-instagram fa-2x "></i></a></li>
    <li><a href=""><i class="fab fa-facebook-square fa-2x"></i></a></li>
    <li><a href=""><i class="fab fa-twitter-square fa-2x"></i></a></li>
  </ul>
  <div class="text-center text-dark"><a href="#" class="">Volver arriba</a></div>

</footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
