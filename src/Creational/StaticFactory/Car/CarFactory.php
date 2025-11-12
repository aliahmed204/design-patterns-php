<?php

namespace Creational\StaticFactory\Car;

class CarFactory
{
    public static function factory(string $type): Car
    {
        return match ($type){
            'bmw'   => new BMWCar(),
            'benz'  => new BENZCar(),
            default => throw new \InvalidArgumentException('Invalid notification type'),
        };
    }
}