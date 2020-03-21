<?php

namespace main\com\desafio;

abstract class Unidad{
  protected int $puntosFuerza;
  protected int $costoEntrenamiento;
  protected int $puntosObtEntrenamiento;
  protected int $costoTransformacion;

  public function entrenar() : void{
    $this->puntosFuerza += $this->puntosObtEntrenamiento;
  }

  public function getPuntosFuerza(){
    return $this->puntosFuerza;
  }

  public function getCostoEntrenamiento(){
    return $this->costoEntrenamiento;
  }

  public function getCostoTransformacion(){
    return $this->costoTransformacion;
  }

  public abstract function transformar() : Unidad;
}
