<?php

namespace Creational\Pool;

class CarPool
{
    private array $freeCars = [];

    private array $busyCars = [];

    public function rantCar(): Car
    {
        if( empty($this->freeCars) ) {
            $car = new Car();
        }else{
            $car = array_pop($this->freeCars);
        }

        $this->busyCars[spl_object_hash($car)] = $car;

        return $car;
    }

    public function returnCar(Car $car): void
    {
        $carHash = spl_object_hash($car);
        if( isset($this->busyCars[$carHash]) ) {
            unset($this->busyCars[$carHash]);
            $this->freeCars[] = $car;
        }
    }

    public function carReport(): int
    {
        return $this->getFreeCarsCount() + $this->getBusyCarsCount();
    }

    public function getFreeCarsCount(): int
    {
        return count($this->freeCars);
    }
    
    public function getBusyCarsCount(): int
    {
        return count($this->busyCars);
    }
}