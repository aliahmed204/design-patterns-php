<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;

Interface BrandFactory
{
    public function buildBrand(): CarBrandInterface;
}