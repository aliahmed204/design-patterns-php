<?php

namespace Creational\StaticFactory\Car;

class BENZCar implements Car
{
    public function model()
    {
        return 'Benz car created!';
    }
}