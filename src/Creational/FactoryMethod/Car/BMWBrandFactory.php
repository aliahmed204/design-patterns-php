<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;

class BMWBrandFactory implements BrandFactory
{
    public function buildBrand(): BMWBrand
    {
        // Implement BuildBrand() method.
        return new BMWBrand();
    }

}