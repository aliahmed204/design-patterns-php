<?php

declare(strict_types=1);

namespace Creational\Builder\Car;

use Creational\Builder\Car\Models\Car;

class CarProducer
{

    public function __construct(
        private CarBuilderInterface $builder
    ) {}

    public function produceCar(): Car
    {
            $this->builder->createCar();
            $this->builder->addBody()->addDoors()->addEngine()->addWheel();
            
            return $this->builder->getCar();
    }
}