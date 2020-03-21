<?php

namespace main\com\desafio;

use PHPUnit\Framework\TestCase;

class GeneradorEjercitosTest extends TestCase
{

/**
 * @test
 */
  public function generar(){
    try {
        //EJERCITOS CHINOS
        $chinos1 = new Civilizacion(1, "Chinos", 2, 25, 2);
        $ejercitoChino1 = GeneradorEjercitos::generar($chinos1);
        $chinos2 = new Civilizacion(2, "Chinos", 2, 25, 2);
        $ejercitoChino2 = GeneradorEjercitos::generar($chinos2);

        //PUNTOS DE FUERZA
        $this->assertEquals(300, $ejercitoChino1->puntosTotales());
        $this->assertEquals(300, $ejercitoChino2->puntosTotales());
        //MONEDAS
        $this->assertEquals(1000, $ejercitoChino1->getMonedas());
        $this->assertEquals(1000, $ejercitoChino2->getMonedas());

        //EJERCITOS INGLESES
        $ingleses1 = new Civilizacion(3, "Ingleses", 10, 10, 10);
        $ejercitoIngles1 = GeneradorEjercitos::generar($ingleses1);
        $ingleses2 = new Civilizacion(4, "Ingleses", 10, 10, 10);
        $ejercitoIngles2 = GeneradorEjercitos::generar($ingleses2);
        $ingleses3 = new Civilizacion(5, "Ingleses", 10, 10, 10);
        $ejercitoIngles3 = GeneradorEjercitos::generar($ingleses2);

        //PUNTOS DE FUERZA
        $this->assertEquals(350, $ejercitoIngles1->puntosTotales());
        $this->assertEquals(350, $ejercitoIngles2->puntosTotales());
        $this->assertEquals(350, $ejercitoIngles3->puntosTotales());
        //MONEDAS
        $this->assertEquals(1000, $ejercitoIngles1->getMonedas());
        $this->assertEquals(1000, $ejercitoIngles2->getMonedas());
        $this->assertEquals(1000, $ejercitoIngles3->getMonedas());

        //EJERCITOS BIZANTINOS
        $bizantino1 = new Civilizacion(6, "Bizantinos", 5, 8, 15);
        $ejercitoBizantino1 = GeneradorEjercitos::generar($bizantino1);
        $this->assertEquals(405, $ejercitoBizantino1->puntosTotales());

        //MONEDAS
        $this->assertEquals(1000, $ejercitoBizantino1->getMonedas());
    }
    catch (Exception $exception) {
        $this->fail("Error " . $exception->getMessage());
    }
  }
}
