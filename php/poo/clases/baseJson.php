<?php
class BaseJson extends BaseDato{
    private $nombreArchivo;
    public function __construct($nombreArchivo){
        $this->nombreArchivo = $nombreArchivo;
    }
    public function getNombreArchivo(){
        return $this->nombreArchivo;
    }
    public function setNombreArchivo($nombreArchivo){
        $this->nombreArchivo = $nombreArchivo;
    }

    //Función que nos permite buscar por email, a ver si el usuario existe o no en nuestra base de datos, que ahorita es un archivo json.
    public function buscar($email){
        $usuarios = $this->abrir();
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
    public function abrir(){
        if(file_exists($this->getNombreArchivo())){
            $archivoJson = file_get_contents($this->getNombreArchivo());
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
    public function guardar($registro){
        $archivoJson = json_encode($registro);
        file_put_contents($this->getNombreArchivo(),$archivoJson.PHP_EOL,FILE_APPEND);
    }
}