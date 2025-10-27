<?php

namespace Creational\AbstractFactory\Car;

/**
 * Abstract factory for creating car objects.
 *
 * @method CarInterface createBenzCar() Creates a new instance of BenzCar.
 * @method CarInterface createBMWCar() Creates a new instance of BMWCar.
 */
class CarAbstractFactory
{
    /**
     * Creates a new instance of BenzCar.
     *
     * @return CarInterface The newly created BenzCar instance.
     */
    public function createBenzCar(): CarInterface
    {
        return new BenzCar(10000, 1.2);
    }

    /**
     * Creates a new instance of BMWCar.
     *
     * @return CarInterface The newly created BMWCar instance.
     */
    public function createBMWCar(): CarInterface
    {
        return new BMWCar(10000);
    }
}