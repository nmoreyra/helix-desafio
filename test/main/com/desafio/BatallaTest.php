<?php

namespace main\com\desafio;

use PHPUnit\Framework\TestCase;

class BatallaTest extends TestCase
{
  public function testBatalla(){
    //EJERCITOS
    $chinos1 = new Civilizacion(1, "Chinos", 2, 25, 2);
    $ejercitoChino1 = GeneradorEjercitos::generar($chinos1);
    $this->assertEquals(300, $ejercitoChino1->puntosTotales());
    $ingleses1 = new Civilizacion(3, "Ingleses", 10, 10, 10);
    $ejercitoIngles1 = GeneradorEjercitos::generar($ingleses1);

    //CHINOS ATACAN INGLESES
    $batalla = $ejercitoChino1->atacar($ejercitoIngles1);

    //CHINOS PIERDEN
    $this->assertEquals(BatallaResultado::PERDEDOR, $batalla->getRestultadoAtacante());
    //INGLESES GANAN 100 MONEDAS
    $this->assertEquals(1100, $batalla->getAtacado()->getMonedas());
    //CHINOS PIERDEN 2 UNIDADES
    $this->assertCount(27, $batalla->getAtacante()->getUnidades());

    //TEST EMPATE
    $bizantino1 = new Civilizacion(6, "Bizantinos", 5, 8, 15);
    $ejercitoBizantino1 = GeneradorEjercitos::generar($bizantino1);
    $bizantino2 = new Civilizacion(7, "Bizantinos", 5, 8, 15);
    $ejercitoBizantino2 = GeneradorEjercitos::generar($bizantino2);

    //BIZANTINOS ATACAN BIZANTINOS
    $batalla = $ejercitoBizantino1->atacar($ejercitoBizantino2);

    //EMPATE
    $this->assertEquals(BatallaResultado::EMPATE, $batalla->getRestultadoAtacante());
    //AMBOS EJERCITOS PIERDEN UNA UNIDAD
    $this->assertCount(27, $batalla->getAtacante()->getUnidades());
    $this->assertCount(27, $batalla->getAtacado()->getUnidades());

  }
}
