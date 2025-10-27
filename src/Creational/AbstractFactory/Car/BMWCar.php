<?Php

namespace Creational\AbstractFactory\Car;

/**
 * Class BMWCar
 * Represents a BMW car implementation of CarInterface.
 *
 * Properties:
 * @property float $price The base price of the car.
 *
 * Methods:
 * @method float calcPrice() Calculates the final price of the car.
 */
class BMWCar implements CarInterface
{
    public function __construct(
        private float $price
    ) {}

    /**
     * Calculates the final price of the car.
     *
     * The formula is: base price * 10000.
     *
     * @return float The final price of the car.
     */
    public function calcPrice(): float
    {
        return $this->price * 10000;
    }
}