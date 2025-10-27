<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Car;

interface CarInterface
{
    public function calcPrice(): float;
}