<?php

namespace main\com\desafio;

class GeneradorEjercitos
{
  public static function generar(Civilizacion $civilizacion) : Ejercito{
    $ejercito = new Ejercito($civilizacion->getidCivilizacion());
    $ejercito->setUnidades(self::generarUnidades($civilizacion));
    return $ejercito;
  }

  private static function generarUnidades(Civilizacion $civilizacion) : array{
    $unidades = array();

    //GENERO PIQUEROS
    $unidades = array_merge($unidades, self::generarUnidad($civilizacion->getCantPiqueros(), "piquero"));
    //GENERO ARQUEROS
    $unidades = array_merge($unidades, self::generarUnidad($civilizacion->getCantArqueros(), "arquero"));
    //GENERO CABALLEROS
    $unidades = array_merge($unidades, self::generarUnidad($civilizacion->getCantCaballeros(), "caballero"));

    return $unidades;
  }

  private static function generarUnidad(int $cantidad, string $tipo) : array {
    $unidades = array();

    for ($i = 0; $i < $cantidad; $i++){
      $unidades[] = UnidadFactory::crearUnidad($tipo);
    }

    return $unidades;
  }
}
