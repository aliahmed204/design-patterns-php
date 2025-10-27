<?php

namespace Creational\Builder\Car\Models;

class BMWCar extends Car
{
    public function setPart(string $name, string|int $value): void
    {
        $this->data[$name] = $value;
    }
}