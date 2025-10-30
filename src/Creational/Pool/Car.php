<?php

namespace Creational\Pool;

class Car
{
    private $rantAt;

    public function __construct()
    {
        $this->rantAt = new \DateTime();
    }

    public function moveCar(): string
    {
        return 'car is moving...';
    }

}