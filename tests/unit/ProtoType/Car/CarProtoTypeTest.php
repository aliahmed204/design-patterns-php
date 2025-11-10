<?php

namespace Tests\Unit\ProtoType\Car;

use Creational\ProtoType\Car\AutoCarProtoType;
use Creational\ProtoType\Car\ManaualCarProtoType;
use PHPUnit\Framework\TestCase;

class CarProtoTypeTest extends TestCase
{
    public function test_it_can_create_auto_cars_with_clone(): void
    {
        $standardCar = new AutoCarProtoType();
        for ($i = 0; $i < 5; $i++) {
            $clonedCar = clone $standardCar;
            $clonedCar->setFlag("Car number " . ($i + 1));
            
            $this->assertEquals("Car number " . ($i + 1), $clonedCar->getFlag());
            $this->assertInstanceOf(AutoCarProtoType::class, $clonedCar);
        }
    }

    public function test_it_can_create_manual_cars_with_clone(): void
    {
        $standardCar = new ManaualCarProtoType();
        for ($i = 0; $i < 5; $i++) {
            $clonedCar = clone $standardCar;
            $clonedCar->setFlag("Car number " . ($i + 1));
            
            $this->assertEquals("Car number " . ($i + 1), $clonedCar->getFlag());
            $this->assertInstanceOf(ManaualCarProtoType::class, $clonedCar);
        }
    }

}