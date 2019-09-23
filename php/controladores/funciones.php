<?php
session_start();

function validar($datos,$imagen){
    
    $errores = [];
    $userName = trim($datos['userName']);
    if(empty($userName )){
        $errores['userName']="El campo nombre no lo puede dejar en blanco..";
    }
    $email = trim($datos['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores['email']="Email inválido...";
    }
    $password = trim($datos['password']);
    if(empty($password)){
        $errores['password']="El password no puede ser blanco...";
    }elseif (!is_numeric($password)) {
        $errores['password']="El password debe ser numérico...";
    }elseif (strlen($password)<6) {
        $errores['password']="El password como mínimo debe tener 6 caracteres...";
    }
    $passwordRepeat = trim($datos['passwordRepeat']);
    if($password != $passwordRepeat){
        $errores['passwordRepeat']="Las contraseñas deben ser iguales";
    }
    if(isset($_FILES)){
        $nombre = $imagen['avatar']['name'];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        if($imagen['avatar']['error']!=0){
            $errores['avatar']="Hermano querido debes subir tu foto...";

        }elseif ($ext != "jpg" && $ext != "png") {
            $errores['avatar']="Formato inválido";
        }
    }


    return $errores;
}

function armarRegistro($datos,$avatar){
    $usuario = [
        'userName' => $datos['userName'],
        'email' => $datos['email'],
        'password' => password_hash($datos['password'],PASSWORD_DEFAULT),
        'avatar'=>$avatar,
        'role'=>1
    ];
    return $usuario;

}

function guardarRegistro($registro){
    $archivoJson = json_encode($registro);
    file_put_contents('usuarios.json',$archivoJson.PHP_EOL,FILE_APPEND);
}

function armarAvatar($imagen){
    $nombre = $imagen['avatar']['name'];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenes/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar.".".$ext;
    //Aquí estoy copiando al servidor nuestro archivo
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatar = $avatar.".".$ext;
    return $avatar;
}

function validarLogin($datos){
  $email = trim($datos['email']);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores['email']="Email inválido...";
  }
  $password = trim($datos['password']);
  if(empty($password)){
      $errores['password']="El password no puede ser blanco...";
  }elseif (!is_numeric($password)) {
      $errores['password']="El password debe ser numérico...";
  }elseif (strlen($password)<6) {
      $errores['password']="El password como mínimo debe tener 6 caracteres...";
  }
  return $errores;
}

function buscarPorEmail($email){
  $usuario = abrirBaseDatos();
  if($usuarios != null){
    foreach ($usuarios as $usuario) {
      if($email === $usuario["email"]){
        return $usuario;
      }
    }
  }
  return null;
}

function abrirBaseDatos(){
  if(file_exists("usuarios.json")){
    $archivoJson = file_get_contents("usuario.json");
    $asrchivoJson = explode(PHP_EOL,$archivoJson);
    array_pop($archivoJson);
    foreach ($archivoJson as $usuarios) {
      $arrayUsuarios[]= jason_decode($usuarios, true);
    }
    return $arrayUsuarios;
  }else{
    return null;
  }
}

function seteoUsuario($usuario, $dato){
  $_SESSION["nombre"]=$usuario["userName"];
  $_SESSION["email"]=$usuario["email"];
  $_SESSION["avatar"]=$usuario["avatar"];
  $_SESSION["role"]=$usuario["role"];
  if(isset($dato["recordarme"])){
    setcookie("email", $usuario["email"], time()+3600);
    setcookie("password", $datos["password"], time()+3600);
  }
}

function validarUsuari0(){
  if (isset($SESSION["email"])) {
    return true;
  }elseif(isset($_cookie["email"])){
    $_SESSION["email"]=$_cookie["email"];
    return true;
  }
  else{
    return false;
  }
}
