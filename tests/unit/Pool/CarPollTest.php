<?php

declare(strict_types=1);

namespace Tests\Unit\Pool;

use Creational\Pool\Car;
use PHPUnit\Framework\TestCase;
use Creational\Pool\CarPool;

class CarPollTest extends TestCase
{
    private CarPool $carPool;

    public function setUp(): void
    {
        Parent::setUp();
        $this->carPool = new CarPool();
    }

    public function test_it_can_rent_a_car(): void
    {
        $myCar = $this->carPool->rantCar();

        $this->assertInstanceOf(Car::class, $myCar);
        
        $this->assertEquals(1, $this->carPool->carReport());
    }

    public function test_it_can_free_a_car(): void
    {
        $myCar = $this->carPool->rantCar();

        $this->carPool->returnCar($myCar);

        $this->assertEquals(0, $this->carPool->getBusyCarsCount());
    }

    public function test_it_will_return_a_car_to_free_cars(): void
    {
        $myCar = $this->carPool->rantCar();
        $myCar2 = $this->carPool->rantCar();
        
        $this->carPool->returnCar($myCar);

        $this->assertEquals(2, $this->carPool->carReport());
        $this->assertEquals(1, $this->carPool->getFreeCarsCount());
        $this->assertEquals(1, $this->carPool->getBusyCarsCount());
    }

    public function test_it_will_not_create_new_car_when_has_free_car(): void
    {
        $myCar = $this->carPool->rantCar();
        $myCar2 = $this->carPool->rantCar();

        $this->carPool->returnCar($myCar);
        $myCar3 = $this->carPool->rantCar();

        $this->assertEquals(2, $this->carPool->carReport());
        $this->assertEquals(0, $this->carPool->getFreeCarsCount());
        $this->assertEquals(2, $this->carPool->getBusyCarsCount());
    }
}