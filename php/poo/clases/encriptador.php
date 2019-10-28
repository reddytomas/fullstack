<?php
class Encriptador{
    static public function encriptar($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }
}