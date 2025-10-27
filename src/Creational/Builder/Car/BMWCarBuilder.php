<?php

declare(strict_types=1);

namespace Creational\Builder\Car;

use Creational\Builder\Car\Models\BMWCar;

class BMWCarBuilder implements CarBuilderInterface
{
    private BMWCar $car;

    public function createCar(): void
    {
        $this->car = new BMWCar();
    }

    public function addEngine(): static
    {
        $this->car->setPart('engine', 'V8 Turbo BMW Engine');
        return $this;
    }

    public function addDoors(): static
    {
        $this->car->setPart('doors', 4);
        return $this;
    }

    public function addBody(): static
    {
        $this->car->setPart('body', 'Sedan BMW Body');
        return $this;
    }

    public function addWheel(): static
    {
        $this->car->setPart('wheels', 4);
        return $this;
    }

    public function getCar(): BMWCar
    {
        return $this->car;
    }

}