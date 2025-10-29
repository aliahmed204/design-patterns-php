<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;

Interface CarBrandInterface
{
    public function createBrand();
}

// Createor
// 1- CarBrandInterface: return type of prodcut