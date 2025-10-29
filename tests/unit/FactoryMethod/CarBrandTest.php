<?php

declare(strict_types=1);

namespace tests\unit\Builders;

use Creational\FactoryMethod\Car\BENZBrand;
use Creational\FactoryMethod\Car\BENZBrandFactory;
use Creational\FactoryMethod\Car\BMWBrand;
use Creational\FactoryMethod\Car\BMWBrandFactory;
use PHPUnit\Framework\TestCase;

class CarBrandTest extends TestCase
{
    public  function  test_it_can_build_BMW_brand()
    {
        // Arrange
        $brandFactory = new BMWBrandFactory();
        
        // Act
        $carBrand = $brandFactory->buildBrand();
        
        // Assert
        $this->assertInstanceOf(BMWBrand::class, $carBrand);
        $this->assertStringContainsString('BMW', $carBrand->createBrand());
    }

    public  function  test_it_can_build_BENZ_brand()
    {
        // Arrange
        $brandFactory = new BENZBrandFactory();
        
        // Act
        $carBrand = $brandFactory->buildBrand();
        
        // Assert
        $this->assertInstanceOf(BENZBrand::class, $carBrand);
        $this->assertStringContainsString('Benz', $carBrand->createBrand());
    }
}