<?php

declare(strict_types=1);

namespace Creational\FactoryMethod\Car;

class BENZBrand implements CarBrandInterface
{
 public function createBrand()
 {
     // Implement createBrand() method.
      return "Benz Brand";
 }
}