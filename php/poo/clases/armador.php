<?php
class Armador{
    //Esta función nos permite armar el registro cuando el usuario selecciona el avatar
    public function armarAvatar($imagen){
        $nombre = $imagen['avatar']['name'];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        $archivoOrigen = $imagen['avatar']['tmp_name'];
        $archivoDestino = dirname(__DIR__);
        $archivoDestino = $archivoDestino."/imagenes/";
        $avatar = uniqid();
        $archivoDestino = $archivoDestino.$avatar.".".$ext;
        //Aquí estoy copiando al servidor nuestro archivo destino creado
        move_uploaded_file($archivoOrigen,$archivoDestino);
        //Aquí estoy retornando al usuario sólo la imagen, la cual será guardada en el archivo json
        $avatar = $avatar.".".$ext;
        return $avatar;
    }
    //Esta función nos ayuda a preparar el array asociativo de mi registro
    public function armarRegistro($usuario,$avatar){
        $registro = [
            'userName' => $usuario->getUserName(),
            'email' => $usuario->getEmail(),
            'password' => Encriptador::encriptar($usuario->getPassword()),
            'avatar'=>$avatar,
            'role'=>1
        ];
        return $registro;

    }
}