<?php
session_start();

function validar($datos){

  $errores = [];
  $nombre = trim($datos["nombre"]);
  if(empty($nombre)){
    $errores["nombre"]="compleptar nombre";
  }
  $apellido = trim($datos["apellido"]);
  if(empty($nombre)){
    $errores["apellido"]="compleptar apellido";
  }
  $userName = trim($datos["username"]);
  if(empty($userName)){
    $errores["username"]="completar nombre de usuario";
  }
  $email = trim($datos["email"]);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores["email"]="Email inválido...";
  }
  $password = trim($datos["password"]);
  if(empty($password)){
    $errores["password"]="completar password";
  }
  elseif (!is_numeric($password)) {
    $errores["password"] = "la clave debe ser solo numerica";
  }
  elseif (strlen($password)<=7) {
    $errores["password"]="la clave tiene que tener como minimo 8 caracteres!";
  }
  $passwordRepeat = trim($datos['passwordRepeat']);
  if($password != $passwordRepeat){
      $errores['passwordRepeat']="Las contraseñas deben ser iguales";
  }

  return $errores;

}

function armarRegistro($datos){
  $usuario = [
    "nombre" => $datos['nombre'],
    "apellido" => $datos['apellido'],
    "userName"  => $datos['userName'],
    "password" => password_hash($datos["password"],PASSWORD_DEFAULT),
    "role" => 1
  ];
  return $usuario;
}

function guardarRegistro($registro){
    $archivoJson = json_encode($registro);
    file_put_contents('usuarios.json',$archivoJson.PHP_EOL,FILE_APPEND);
}




 ?>
