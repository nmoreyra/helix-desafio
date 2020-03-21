<?php

namespace main\com\desafio;

class Piquero extends Unidad
{
  const PUNTOSFUERZA = 5;
  const PUNTOSOBTENTRENAMIENTO = 3;
  const COSTOENTRENAMIENTO = 10;
  const COSTOTRANSFORMACION = 40;

  function __construct() {
    $this->puntosFuerza = self::PUNTOSFUERZA;
    $this->puntosObtEntrenamiento = self::PUNTOSOBTENTRENAMIENTO;
    $this->costoEntrenamiento = self::COSTOENTRENAMIENTO;
    $this->costoTransformacion = self::COSTOTRANSFORMACION;
  }

  public function transformar(): Unidad
  {
    //Piquero se transforma en arquero
    return new Arquero($this);
  }
}
