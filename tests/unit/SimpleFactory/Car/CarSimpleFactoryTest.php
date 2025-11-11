<?php

namespace Tests\Unit\SimpleFactory\Car;

use Creational\SimpleFactory\Car\Car;
use Creational\SimpleFactory\Car\CarFactory;
use PHPUnit\Framework\TestCase;

class CarSimpleFactoryTest extends TestCase
{
    public function test_it_can_create_car_with_car_factory()
    {
        $car = CarFactory::create('BenzCar');

        $this->assertInstanceOf(Car::class, $car);
        $this->assertEquals('BenzCar', $car->type);
    }
}