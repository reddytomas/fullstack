<?php
abstract class BaseDato{
    abstract public function abrir();
    abstract public function guardar(array $registro);
    abstract public function buscar($email);
}