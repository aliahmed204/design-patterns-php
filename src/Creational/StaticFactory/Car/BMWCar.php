<?php

namespace Creational\StaticFactory\Car;

class BMWCar implements Car
{
    public function model()
    {
        return 'Bmw car created!';
    }
}