<?php

namespace main\com\desafio;

class Caballero extends Unidad
{
  const PUNTOSFUERZA = 20;
  const PUNTOSOBTENTRENAMIENTO = 10;
  const COSTOENTRENAMIENTO = 30;

  function __construct(){
    $params = func_get_args();
    $num_params = func_num_args();
    $function_constructor ='__construct'.$num_params;
    if (method_exists($this,$function_constructor)) {
      call_user_func_array(array($this,$function_constructor),$params);
    }
  }

  function __construct0(){
    $this->puntosFuerza = self::PUNTOSFUERZA;
    $this->setear();
  }

  function __construct1(Unidad $unidad){
    $this->puntosFuerza = $unidad->getPuntosFuerza();
    $this->setear();
  }

  private function setear(){
    $this->puntosObtEntrenamiento = self::PUNTOSOBTENTRENAMIENTO;
    $this->costoEntrenamiento = self::COSTOENTRENAMIENTO;
  }

  public function transformar(): Unidad
  {
    //NO SE TRANSFORMAR
    return $this;
  }
}
