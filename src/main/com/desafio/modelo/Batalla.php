<?php


namespace main\com\desafio;


use main\com\desafio\modelo\BatallaHelper;

class Batalla
{
  private Ejercito $atacante;
  private Ejercito $atacado;
  private int $restultadoAtacante;
  private int $restultadoAtacado;

  function __construct(Ejercito $atacante, Ejercito $atacado) {
    $this->atacante = $atacante;
    $this->atacado = $atacado;
  }

  public function setResultado(int $restultadoAtacante){
    $this->restultadoAtacante = $restultadoAtacante;
    switch ($restultadoAtacante){
      case BatallaResultado::GANADOR:
        $this->restultadoAtacado = BatallaResultado::PERDEDOR;
        break;
      case BatallaResultado::PERDEDOR:
        $this->restultadoAtacado = BatallaResultado::GANADOR;
        break;
      case BatallaResultado::EMPATE:
        $this->restultadoAtacado = BatallaResultado::EMPATE;
        break;
    }
  }

  public function getAtacante(){
    return $this->atacante;
  }

  public function getAtacado(){
    return $this->atacado;
  }

  public function getRestultadoAtacante(){
    return $this->restultadoAtacante;
  }

  public function getResultadoAtacado(){
    return $this->restultadoAtacado;
  }
}
