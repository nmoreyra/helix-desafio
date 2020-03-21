<?php


namespace main\com\desafio;


use main\com\desafio\BatallaResultado;
use main\com\desafio\Ejercito;

abstract class BatallaHelper
{
  public static function batallar(Batalla $batalla){
    $puntosEjercitoAtacante = $batalla->getAtacante()->puntosTotales();
    $puntosEjercitoAtacado = $batalla->getAtacado()->puntosTotales();

    //CALCULO RESULTADO DE LA BATALLA POR DEFECTO EMPATE
    $resultadoBatallaAtacante = BatallaResultado::EMPATE;

    if($puntosEjercitoAtacante > $puntosEjercitoAtacado){
      //GANA EJERCITO ATACANTE
      $resultadoBatallaAtacante = BatallaResultado::GANADOR;

      self::ganaBatalla($batalla->getAtacante());
      self::pierdeBatalla($batalla->getAtacado());
    }
    else if($puntosEjercitoAtacante < $puntosEjercitoAtacado){
      //PIERDE EJERCITO ATACANTE
      $resultadoBatallaAtacante = BatallaResultado::PERDEDOR;

      self::ganaBatalla($batalla->getAtacado());
      self::pierdeBatalla($batalla->getAtacante());
    }
    else{
      //EMPATE
      self::empateBatalla($batalla->getAtacante());
      self::empateBatalla($batalla->getAtacado());
    }

    $batalla->setResultado($resultadoBatallaAtacante);

    //SETEO BATALLAS A AMBOS EJERCITOS
    $batallasAtacante = $batalla->getAtacante()->getBatallas();
    $batallasAtacante[] = $batalla;
    $batalla->getAtacante()->setBatallas($batallasAtacante);

    $batallasAtacado = $batalla->getAtacado()->getBatallas();
    $batallasAtacado[] = $batalla;
    $batalla->getAtacado()->setBatallas($batallasAtacado);
  }

  private static function empateBatalla(Ejercito $ejercito) : void{
    $unidades = $ejercito->getUnidades();

    //ORDENO ARRAY DE UNIDADES
    usort($unidades, function($a, $b){
      return $a->getPuntosFuerza() < $b->getPuntosFuerza();
    });

    //REMUEVO DEL ARRAY LA UNIDAD CON MENOR CANTIDAD DE PUNTOS DE FUERZA
    array_pop($unidades);

    $ejercito->setUnidades($unidades);
  }

  private static function ganaBatalla(Ejercito $ejercito) : void{
    $ejercito->setMonedas($ejercito->getMonedas() + 100);
  }

  private static function pierdeBatalla(Ejercito $ejercito) : void{
    $unidades = $ejercito->getUnidades();

    //ORDENO ARRAY DE UNIDADES
    usort($unidades, function($a, $b){
      return $a->getPuntosFuerza() < $b->getPuntosFuerza();
    });

    //REMUEVO DEL ARRAY LAS DOS UNIDADES CON MAYOR CANTIDAD DE PUNTOS DE FUERZA
    array_shift($unidades);
    array_shift($unidades);

    $ejercito->setUnidades($unidades);
  }
}
