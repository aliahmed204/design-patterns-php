<?php

namespace Structural\Bridge\Car;

class BENZCar extends Car
{
    public function getCar(): string
    {
        return $this->color->applyColor() ." BENZCar";
    }
}