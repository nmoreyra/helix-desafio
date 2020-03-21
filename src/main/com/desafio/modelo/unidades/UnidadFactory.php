<?php

namespace main\com\desafio;

abstract class UnidadFactory
{
  public static function crearUnidad(string $tipo) : ?Unidad {
    switch ($tipo) {
      case "piquero":
        return new Piquero();
        break;
      case "arquero":
        return new Arquero();
        break;
      case "caballero":
        return new Caballero();
        break;
      default:
        return null;
        break;
    }
  }
}
