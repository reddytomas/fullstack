<?php
require_once("cliente.php");

abstract class cuenta extends Cliente{
  private $cbu;
  private $balance = 0;
  private $fechaUltimoM = 0;


public function __construct(int $cbu) {
  $this->cbu = $cbu;

}

public function setCbu($cbu){
  $this->cbu = $cbu;
}
public function getCbu(){
  return $this->cbu;
  }
public function setBalance($balance){
  $this->balance = $balance;
}
public function getBalance(){
  return $this->balance;
}
public function getFechaUltimoM($fechaUltimoM){
  $this->fechaUltimoM = $fechaUltimoM;
}
public function getFechaUltimoM(){
  return $this->fechaUltimoM;
}

abstract public function debitar($monto, $origen);

public function acreditar($monto){
  $this->balance += $monto;
  $this->actualizarFechaTran();
}
protected function actualizarFechaTran(){
  $this->fechaUltimoM = date("Y-m-d h:i:s");
}

}

 ?>
