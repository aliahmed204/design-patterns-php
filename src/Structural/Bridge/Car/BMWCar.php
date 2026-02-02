<?php

namespace Structural\Bridge\Car;

class BMWCar extends Car
{
    public function getCar(): string
    {
        return $this->color->applyColor() ." BMWCar";
    }
}