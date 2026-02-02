<?php

namespace Structural\Bridge\Car;

abstract class Car
{
    public function __construct( 
        protected Color $color
    ) {}

    abstract public function getCar();
}