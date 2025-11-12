<?php

namespace Tests\Unit\StaticFactory\Car;

use Creational\StaticFactory\Car\Car;
use Creational\StaticFactory\Car\CarFactory;
use PHPUnit\Framework\TestCase;

class CarStaticFactoryTest extends TestCase
{
    public function test_it_can_create_benz_car_with_car_factory()
    {
        $this->assertInstanceOf(Car::class, CarFactory::factory('benz'));
    }

    public function test_it_can_create_bmw_car_with_car_factory()
    {
        $this->assertInstanceOf(Car::class, CarFactory::factory('bmw'));
    }

    public function test_it_throw_an_exception_when_an_invalid_factory(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        CarFactory::factory('car');
    }
}