<?php

namespace main\com\desafio;

class Ejercito
{
  private array $unidades;
  private int $monedas;
  private int $idCivilizacion;
  private array $batallas;

  function __construct(int $idCivilizacion) {
    $this->idCivilizacion = $idCivilizacion;
    $this->monedas = 1000;
    $this->unidades = [];
    $this->batallas = [];
  }

  public function atacar(Ejercito $ejercitoAtacado) : Batalla{
    $batalla = new Batalla($this, $ejercitoAtacado);
    BatallaHelper::batallar($batalla);
    return $batalla;
  }

  public function puntosTotales() : int{
    $puntosTotales = 0;

    foreach ($this->unidades as $aux) {
      $puntosTotales += $aux->getPuntosFuerza();
    }

    return $puntosTotales;
  }

  public function entrenarUnidad(Unidad $unidad): bool
  {
    if($this->monedas < $unidad->getCostoEntrenamiento())
      return false;

    //DESCUENTO MONEDAS
    $this->monedas = $this->monedas - $unidad->getCostoEntrenamiento();

    //ENTRENO
    $unidad->entrenar();

    return true;
  }

  public function transformarUnidad(Unidad $unidad): Unidad
  {
    if($this->monedas >= $unidad->getCostoTransformacion()) {
      //DESCUENTO MONEDAS
      $this->monedas = $this->monedas - $unidad->getCostoTransformacion();

      //TRANSFORMO
      $unidad = $unidad->transformar();
    }

    return $unidad;
  }

  public function getUnidades(){
    return $this->unidades;
  }

  public function setUnidades($unidades){
    $this->unidades = $unidades;
  }

  public function getMonedas(){
    return $this->monedas;
  }

  public function setMonedas($monedas){
    $this->monedas = $monedas;
  }

  public function getIdCivilizacion(){
    return $this->idCivilizacion;
  }

  public function setIdCivilizacion($idCivilizacion){
    $this->idCivilizacion = $idCivilizacion;
  }

  public function getBatallas(){
    return $this->batallas;
  }

  public function setBatallas($batallas){
    $this->batallas = $batallas;
  }
}
