<?php

namespace main\com\desafio;

use PHPUnit\Framework\TestCase;

class EjercitoTest extends TestCase
{

  public function testEntrenarUnidad()
  {
    $piquero = UnidadFactory::crearUnidad("piquero");
    $piquero->entrenar();
    $this->assertEquals(8, $piquero->getPuntosFuerza());

    $arquero = UnidadFactory::crearUnidad("arquero");
    $arquero->entrenar();
    $this->assertEquals(17, $arquero->getPuntosFuerza());

    $caballero = UnidadFactory::crearUnidad("caballero");
    $caballero->entrenar();
    $this->assertEquals(30, $caballero->getPuntosFuerza());
  }

  public function testTransformarUnidad()
  {
    $piquero = UnidadFactory::crearUnidad("piquero");
    $piquero = $piquero->transformar();
    $this->assertEquals(get_class(new Arquero()), get_class($piquero));
    $this->assertEquals(5, $piquero->getPuntosFuerza());

    $arquero = UnidadFactory::crearUnidad("arquero");
    $arquero = $arquero->transformar();
    $this->assertEquals(get_class(new Caballero()), get_class($arquero));
    $this->assertEquals(10, $arquero->getPuntosFuerza());

    $caballero= UnidadFactory::crearUnidad("caballero");
    $caballero = $caballero->transformar();
    $this->assertEquals(get_class(new Caballero()), get_class($caballero));
    $this->assertEquals(20, $caballero->getPuntosFuerza());
  }
}
