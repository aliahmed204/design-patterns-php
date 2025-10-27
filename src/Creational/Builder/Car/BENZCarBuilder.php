<?php

namespace Creational\Builder\Car;

use Creational\Builder\Car\Models\BENZCar;

class BENZCarBuilder implements CarBuilderInterface
{
    private BENZCar $car;

    public function createCar(): void
    {
        $this->car = new BENZCar();
    }

    public function addEngine(): static
    {
        $this->car->setPart('engine', 'V8 Turbo BENZ Engine');
        return $this;
    }

    public function addDoors(): static
    {
        $this->car->setPart('doors', 4);
        return $this;
    }

    public function addBody(): static
    {
        $this->car->setPart('body', 'Sedan BENZ Body');
        return $this;
    }

    public function addWheel(): static
    {
        $this->car->setPart('wheels', 4);
        return $this;
    }

    public function getCar(): BENZCar
    {
        return $this->car;
    }
}