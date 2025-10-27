<?php

declare(strict_types=1);

namespace tests\unit\AbstractFactory;

use Creational\AbstractFactory\Car\CarAbstractFactory;
use Creational\AbstractFactory\Car\CarInterface;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function testCanCreateBenzCar(): void
    {
        $carFactory = new CarAbstractFactory();
        $benzCar = $carFactory->createBenzCar();

        $this->assertInstanceOf(CarInterface::class, $benzCar);

        $price = $benzCar->calcPrice(); 

        $this->assertEquals(120000000, $price);
    }

    public function testCanCreateBMWCare(): void
    {
        $carFactory = new CarAbstractFactory();
        $bmwCar = $carFactory->createBMWCar();

        $this->assertInstanceOf(CarInterface::class, $bmwCar);

        $price = $bmwCar->calcPrice();
        $this->assertEquals(100000000, $price);
    }
}