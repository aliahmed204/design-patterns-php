<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;

class BMWBrand implements  CarBrandInterface
{
    public function createBrand()
    {
        return "BMW Brand";
    }

}