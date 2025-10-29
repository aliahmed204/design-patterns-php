<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;


class BENZBrandFactory implements BrandFactory
{
    public function buildBrand(): BENZBrand
    {
        // Implement BuildBrand() method.
        return new BENZBrand();
    }

}