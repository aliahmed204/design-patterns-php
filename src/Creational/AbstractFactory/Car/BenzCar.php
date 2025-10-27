<?php

namespace Creational\AbstractFactory\Car;

/**
 * Class BenzCar
 * Represents a Benz car implementation of CarInterface.
 *
 * Properties:
 * @property float $price The base price of the car.
 * @property float $tax The tax rate applied to the car.
 *
 * Methods:
 * @method float calcPrice() Calculates the final price of the car.
 */
class BenzCar implements CarInterface
{
    public function __construct(
        private float $price,
        private float $tax
    ) {}

    /**
     * Calculates the final price of the car.
     *
     * The formula is: base price * tax rate * 10000.
     *
     * @return float The final price of the car.
     */
    public function calcPrice(): float
    {
        return $this->price * $this->tax * 10000;
    }
}