<?php

namespace main\com\desafio;

class Civilizacion
{
  private int $idCivilizacion;
  private string $descripcion;
  private int $cantPiqueros;
  private int $cantArqueros;
  private int $cantCaballeros;

  function __construct(int $idCivilizacion, string $descripcion, int $cantPiqueros, int $cantArqueros, int $cantCaballeros) {
    $this->idCivilizacion = $idCivilizacion;
    $this->descripcion = $descripcion;
    $this->cantPiqueros = $cantPiqueros;
    $this->cantArqueros = $cantArqueros;
    $this->cantCaballeros = $cantCaballeros;
  }

  public function getidCivilizacion(){
    return $this->idCivilizacion;
  }

  public function setidCivilizacion($idCivilizacion){
    $this->idCivilizacion = $idCivilizacion;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }

  public function getCantPiqueros(){
    return $this->cantPiqueros;
  }

  public function getCantArqueros(){
    return $this->cantArqueros;
  }

  public function getCantCaballeros(){
    return $this->cantCaballeros;
  }

}
