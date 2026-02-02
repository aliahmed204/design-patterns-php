<?php

namespace Tests\Unit\Bridge\Car;

use PHPUnit\Framework\TestCase;
use Structural\Bridge\Car\{
    BENZCar,
    BlueColor,
    BMWCar,
    RedColor
};

class CarBridgeTest extends TestCase
{
    public function test_it_can_create_blue_bmw_car(): void
    {
        $blueCar = new BMWCar(new BlueColor());

        $this->assertInstanceOf(BMWCar::class, $blueCar);
        $this->assertEquals("Blue BMWCar", $blueCar->getCar());
    }

    public function test_it_can_create_red_benz_color(): void
    {
        $redCar = new BENZCar(new RedColor());

        $this->assertInstanceOf(BENZCar::class, $redCar);
        $this->assertStringContainsString("Red", $redCar->getCar());
    }
}