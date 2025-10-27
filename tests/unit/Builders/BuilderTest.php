<?php

declare(strict_types=1);

namespace tests\unit\Builders;

use Creational\Builder\Car\BENZCarBuilder;
use Creational\Builder\Car\BMWCarBuilder;
use Creational\Builder\Car\CarProducer;
use Creational\Builder\Car\Models\BENZCar;
use Creational\Builder\Car\Models\BMWCar;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public  function  test_produce_BMWCar()
    {
        // Arrange
        $Builder = new BMWCarBuilder();
        $carProducer = new CarProducer($Builder);
       
        // Act
        $myCar = $carProducer->produceCar();

        // Assert
        $this->assertInstanceOf(BMWCar::class ,$myCar);
        $this->assertArrayHasKey('engine', $myCar->getParts());
        $this->assertEquals('V8 Turbo BMW Engine', $myCar->getParts()['engine']);
        $this->assertEquals(4, $myCar->getParts()['doors']);
        $this->assertEquals('Sedan BMW Body', $myCar->getParts()['body']);
        $this->assertEquals(4, $myCar->getParts()['wheels']);
    }

    public  function  test_produce_BENZCar()
    {
        // Arrange
        $Builder = new BENZCarBuilder();
        $carProducer = new CarProducer($Builder);
        
        // Act
        $myCar = $carProducer->ProduceCar();
        
        // Assert
        $this->assertInstanceOf(BENZCar::class ,$myCar);
        $this->assertArrayHasKey('body', $myCar->getParts());
        $this->assertEquals('V8 Turbo BENZ Engine', $myCar->getParts()['engine']);
        $this->assertEquals(4, $myCar->getParts()['doors']);
        $this->assertEquals('Sedan BENZ Body', $myCar->getParts()['body']);
        $this->assertEquals(4, $myCar->getParts()['wheels']);
    }
}