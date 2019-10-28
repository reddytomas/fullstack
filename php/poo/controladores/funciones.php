<?php

class usuario
{
  private $nombre;
  private $apellido;
  private $userName;
  private $email;
  private $password;
  private $passwordRepeat;

  public function __construct(string $nombre, string $apellido, string $email, string $userName, int $password, int $passwordRepeat)
  {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->userName = $userName;
    $this->email = $email;
    $this->password = $password;
    $this->passwordRepeat = $passwordRepeat;
}
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }
  public function setuserName($userName)
  {
    $this->userName = $userName;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setpassword($password)
  {
    $this->password = $password;
  }
  public function setpasswordRepeat($passwordRepeat)
  {
    $this->passwordRepeat = $passwordRepeat;
  }
  public function getNombre($nombre){
    return $this->nombre;
  }
  public function getApellido($apellido){
    return $this->apellido;
  }
  public function getUserName($userName){
    return $this->userName;
  }
  public function getEmail($email){
    return $this->email;
  }
  public function getPassword($password){
    return $this->password;
  }
  public function getPasswordRepeat($passwordRepeat){
    return $this->passwordRepeat;
  }

  public function hashContraseña(){
    if(is_numeric($this->getContraseña())){
      password_hash($contraseña,PASSWORD_DEFAULT)
    }}


}
 ?>






<?php
session_start();

function validar($datos,$imagen){

  $errores = [];
  $nombre = trim($datos['nombre']);
  if(empty($nombre)){
    $errores['nombre']="completar nombre";
  }
  $apellido = trim($datos['apellido']);
  if(empty($nombre)){
    $errores['apellido']="compleptar apellido";
  }
  $userName = trim($datos['userName']);
  if(empty($userName)){
    $errores['userName']="completar nombre de usuario";
  }
  $email = trim($datos['email']);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores['email']="Email inválido...";
  }
  $password = trim($datos['password']);
  if(empty($password)){
    $errores['password']="completar password";
  }
  elseif (!is_numeric($password)) {
    $errores['password'] = "la clave debe ser solo numerica";
  }
  elseif (strlen($password)<=7) {
    $errores['password']="la clave tiene que tener como minimo 8 caracteres!";
  }
  $passwordRepeat = trim($datos['passwordRepeat']);
  if($password != $passwordRepeat){
      $errores['passwordRepeat']="Las contraseñas deben ser iguales";
  }

  if(isset($_FILES)){
      $nombre = $imagen['avatar']['name'];
      $ext = pathinfo($nombre,PATHINFO_EXTENSION);
      if($imagen['avatar']['error']!=0){
          $errores['avatar']="elegir Avatar";

      }elseif ($ext != "jpg" && $ext != "png") {
          $errores['avatar']="Formato inválido";
      }
  }

  return $errores;

}

function armarRegistro($datos,$avatar){
  $usuario = [
    "nombre" => $datos['nombre'],
    "apellido" => $datos['apellido'],
    "email" => $datos['email'],
    "userName"  => $datos['userName'],
    "password" => password_hash($datos["password"],PASSWORD_DEFAULT),
    'avatar'=> $avatar,
    "role" => 1
  ];
  return $usuario;
}

function guardarRegistro($registro){
    $archivoJson = json_encode($registro);
    file_put_contents('usuarios.json',$archivoJson.PHP_EOL,FILE_APPEND);
}
//armado de avatar//
function armarAvatar($imagen){
    $nombre = $imagen['avatar']['name'];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino . "/imagenes/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar.".".$ext;
    //Aquí estoy copiando al servidor nuestro archivo destino creado
    move_uploaded_file($archivoOrigen, $archivoDestino);
    //Aquí estoy retornando al usuario sólo la imagen, la cual será guardada en el archivo json
    $avatar = $avatar.".".$ext;
    return $avatar;
}
//Esta funcion está para validar los datos de login.
function validarLogin($datos){
  $errores=[];
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
//Funcion para buscar si el usuario existe, buscando por email, en la base de datos que es un archivo Json.
function buscarPorEmail($email){
    $usuarios = abrirBaseDatos();
    if($usuarios !=null){
        foreach ($usuarios as  $usuario) {
            if($email === $usuario['email']){
                return $usuario;
            }
        }
    }
    return null;
}
//Esta función abre nuestro archivo json y lo prepara para eliminar el último registro en blanco y además, fijese que además genero el array asociativo del mismo. Convierto de json a array asociativo para mas adelante con la funcion "bucarEmail" poder recorrerlo y verificar si el usuario existe o no en mi base de datos, dicha verificación la hago por el email del usuario, ya que es el dato único que tengo del usuario
function abrirBaseDatos(){
    if(file_exists('usuarios.json')){
        $archivoJson = file_get_contents('usuarios.json');
        //Aquí lo que hago es generar cada array con un salto de linea, para poderlo ver ejecute aquí un dd($archivoJson)
        $archivoJson = explode(PHP_EOL,$archivoJson);
        //Aquí saco el ultimo registro, el cual está en blanco
        //ejecute aquí un ($archivoJson), la idea es para que verifique como se va armando el archivo
        array_pop($archivoJson);
        //ejecute aquí un ($archivoJson), la idea es para que verifique como se va armando el archivo

        //Aquí recorro el array y creo mi array con todos los usuarios
        foreach ($archivoJson as  $usuarios) {
            $arrayUsuarios[]= json_decode($usuarios,true);
        }
        //Aquí retorno el array de usuarios con todos sus datos
        return $arrayUsuarios;
    }else{
        return null;
    }
}
//Aqui creo los las variables de session y de cookie de mi usuario que se está loguendo
function seteoUsuario($usuario, $dato){
    $_SESSION['nombre']=$usuario['nombre'];
    $_SESSION['apellido']=$usuario['apellido'];
    $_SESSION['email']=$usuario['email'];
    $_SESSION['role']=$usuario['role'];
    $_SESSION['avatar']= $usuario['avatar'];
    if(isset($dato['recordarme'])) {
    setcookie('email',$usuario['email'],time()+3600);
    setcookie('password',$dato['password'],time()+3600);
    }
  }
//Con esta función controlo si el usuario se logueo o ya tenemos las cookie en la máquina
function validarUsuario(){
    if(isset($_SESSION['email'])){
        return true;
    }elseif(isset($_COOKIE['email'])){
        $_SESSION['email']=$_COOKIE['email'];
        return true;
    }else{
        return false;
    }
}
