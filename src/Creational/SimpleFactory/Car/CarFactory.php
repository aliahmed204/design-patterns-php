<?php

namespace Creational\SimpleFactory\Car;

class CarFactory
{
    public static function create(string $type = 'BME'): Car
    {
        return new Car($type);
    }
}